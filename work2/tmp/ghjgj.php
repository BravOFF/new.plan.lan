<?php
global $MESS;

$strPath2Lang = str_replace( "\\", "/", __FILE__ );
$strPath2Lang = substr( $strPath2Lang, 0, strlen( $strPath2Lang ) - strlen( "/init.php" ) );
include_once( GetLangFileName( $strPath2Lang . "/lang/", "/init.php" ) );

require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . "/bitrix/php_interface/image-resize.php" );
require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . "/bitrix/php_interface/setLangVars.php" );
require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . "/bitrix/php_interface/en_regions.php" );

$aURI = Array();
global $aURI;
$pureURI = $_SERVER["REQUEST_URI"];
if (substr_count($pureURI, "?")) {
    $pos = strpos($pureURI, "?");
    $pureURI = substr($pureURI, 0, $pos);
}
$aURI = explode("/", $pureURI);

// Заполняем поле "Логин" значением "Email" при регистрации и редактировании пользователя
AddEventHandler( "main", "OnBeforeUserRegister", "OnBeforeUserRegisterHandler" );
AddEventHandler( "main", "OnBeforeUserUpdate", "OnBeforeUserUpdateHandler" );
AddEventHandler( "main", "OnBeforeUserDelete", "OnBeforeUserDeleteHandler" );

$tickets_costs = array(
    //5 => 1, // Стандартное участие
    //6 => 1, // Участие со скидкой 20%
    5 => 30000, // Стандартное участие
    6 => 15000, // Партнерское участие
    7 => 0 // Бесплатное участие
);

function OnBeforeUserDeleteHandler( $userId ){

    $rsUser = CUser::GetList( ( $by = "ID" ), ( $order = "desc" ), array( "ID" => $userId ),
        array( "SELECT" => array( "UF_*" ) ) );
    $user   = $rsUser->Fetch();

    //    error_log( "DELETE: ".json_encode( $arFields )."\n\n", 3, "/var/www/orbismap_com/data/~tmp/ipforum.log" );

    // Если админ удалил участника до завершения регистрации,
    // значит это как раз тот случай, когда пользователю отказано в регистрации.
    if( $user[ "ACTIVE" ] == 'N' and !empty( $user[ "UF_REG_KEY" ] ) ){

        // Заполняем поля для письма
        $arEventFields = array(
            "EMAIL" => $user[ "EMAIL" ],
            "NAME"      => $user[ "UF_EN_NAME" ],
            "SURNAME"   => $user[ "UF_EN_SURNAME" ],
        );

        // Отправляем письмо
        CEvent::SendImmediate( "USER_DELETE", $user['LID'], $arEventFields, "N");
    }

}

function OnBeforeUserUpdateHandler( &$arFields ){
    global $tickets_costs;

    if( !empty( $arFields[ 'ID' ] ) ){
        $rsUser   = CUser::GetList( ( $by = "ID" ), ( $order = "desc" ), array( "ID" => $arFields[ 'ID' ] ),
            array( "SELECT" => array( "UF_*" ) ) );
        $rsUser   = $rsUser->Fetch();
        unset($rsUser['PASSWORD']);
        $arFields = array_replace( $rsUser, $arFields );
    }


    if( !empty( $arFields[ 'UF_PHOTO' ] ) and !is_array($arFields[ 'UF_PHOTO' ]) ){
        $arFields[ 'UF_PHOTO' ] = CFile::MakeFileArray( $_SERVER[ 'DOCUMENT_ROOT' ]
            . CFile::GetPath( $arFields[ 'UF_PHOTO' ] ) );
    }

    // К админу эта логика не относится.
    if( $arFields[ "LOGIN" ] != 'admin' ){
        // Меняем логин на мыло.
        $arFields[ "LOGIN" ] = $arFields[ "EMAIL" ];
        $arFields[ "LOGIN" ] = str_pad( $arFields[ "LOGIN" ], 5, "_" );

        if( !preg_match( "/^[a-zA-Zа-пр-яА-ЯёЁ]+[a-zA-Zа-пр-яА-ЯёЁ\s]*$/", $arFields[ "UF_EN_NAME" ] ) ){
            $GLOBALS[ 'APPLICATION' ]->ThrowException( '' );
            return false;
        }

        if( !preg_match( "/^[a-zA-Zа-пр-яА-ЯёЁ]+[a-zA-Zа-пр-яА-ЯёЁ\s]*$/", $arFields[ "UF_EN_SURNAME" ] ) ){
            $GLOBALS[ 'APPLICATION' ]->ThrowException( '' );
            return false;
        }

        if( !preg_match( "/^[\"\']?[0-9a-zA-Zа-пр-яА-ЯёЁ]+[0-9a-zA-Zа-пр-яА-ЯёЁ\s\-\.\"\'\+\&\,\(\)]*$/", $arFields[ "UF_ORG" ] ) ){
            $GLOBALS[ 'APPLICATION' ]->ThrowException( '' );
            return false;
        }

        // Если админ сделал участника активным и у него есть ключ регистрации
        // значит это как раз тот случай, когда пользователь всё ещё проходит регистрацию.
        // Проверка переменной $_POST['confirm_registration_submit'] нужна для того,
        // чтобы почта не улетала повторно при подтверждении аккаунта.
        //        error_log( "UPDATE: ".json_encode( $_POST )."\n\n", 3, "/var/www/orbismap_com/data/~tmp/ipforum.log" );
        if(     $arFields[ "ACTIVE" ] == 'Y'
            and !empty( $arFields[ "UF_REG_KEY" ] )
            and empty( $_POST[ 'confirm_registration_submit' ] )
            and $_POST['TYPE'] != 'CHANGE_PWD'
        ){

            // Вытаскиваем значение категории участия
            $rsCategory = CUserFieldEnum::GetList( array(), array(
                "ID" => $arFields[ "UF_CATEGORY" ],
            ) );
            $rsCategory = $rsCategory->Fetch();
            $enCat = ucfirst($rsCategory['XML_ID']);
            $rsCategory = $rsCategory[ 'VALUE' ];

            // Вытаскиваем статус по оплате
            $rsStatus = CUserFieldEnum::GetList( array(), array(
                "ID" => $arFields[ "UF_STATUS" ],
            ) );
            $rsStatus = $rsStatus->Fetch();
            $rsStatus = $rsStatus[ 'VALUE' ];

            $enStatus = array(
                5 => "Typical participation",
                6 => "Discounted participation (20%)",
                7 => "Free participation"
            );

            // Вытаскиваем цену
            $cost = $tickets_costs[$arFields[ "UF_STATUS" ]];

            // Заполняем поля для письма
            $arEventFields = array(
                "EMAIL"     => $arFields[ "EMAIL" ],
                "UID"       => $arFields[ "ID" ],
                "REG_KEY"   => $arFields[ "UF_REG_KEY" ],
                "NAME"      => $arFields[ "UF_EN_NAME" ],
                "SURNAME"   => $arFields[ "UF_EN_SURNAME" ],
                "UF_CAT"    => ($arFields['LID']=='en')?$enStatus[$arFields[ "UF_STATUS" ]]:$rsStatus,
                "UF_STATUS" => ($arFields['LID']=='en')?$enCat:$rsCategory,
                "COST"      => $cost,
            );

            // ID шаблона письма
            $mailTemplateId = 25;
            // Выбираем шаблон письма в зависимости от категории участия.
            switch( $arFields[ "UF_CATEGORY" ] ){
                case 1:
                case 4:
                    $mailTemplateId = ($arFields['LID']=='en')?34:25;
                    break;
                case 2:
                case 3:
                    $mailTemplateId = ($arFields['LID']=='en')?33:27;
                    break;
            }

            // Если статус участия = Free participation
            if ( $arFields[ "UF_STATUS" ] == 7 ) {
                $mailTemplateId = ($arFields['LID']=='en') ? 58 : 57;
            }

            // Отправляем письмо
            CEvent::SendImmediate( "USER_ACTIVATION", $arFields['LID'], $arEventFields, "N", $mailTemplateId );
        }
    }

    return $arFields;
}

function OnBeforeUserRegisterHandler( &$arFields ){
    $arFields[ "PASSWORD" ]   = md5( $arFields[ "EMAIL" ] . time() );
    $arFields[ "ACTIVE" ]     = "N";
    $arFields[ "UF_REG_KEY" ] = md5( $arFields[ "EMAIL" ] . time() );
    $arFields[ "UF_PAYMENT_STATUS" ] = 8;

    return OnBeforeUserUpdateHandler( $arFields );
}

function resizeImage( $filePath ){
    $imageSize = array( 300, 400 );
    $img       = new SimpleImage();
    $img->load( $filePath );
    if( $img->getWidth() > $imageSize[ 0 ] OR $img->getWidth() > $imageSize[ 1 ] ){

        if( $img->getWidth() >= $img->getWidth() ){
            $img->resizeToWidth( $imageSize[ 0 ] ); # пропорционально по заданной ширине
        }
        else{
            $img->resizeToHeight( $imageSize[ 1 ] ); # пропорционально по заданной высоте
        }
        $img->save( $filePath ); # сохранение измененого изображение
    }
}