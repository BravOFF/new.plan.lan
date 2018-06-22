<?php
/**
 * Created by PhpStorm.
 * User: BravovRM
 * Date: 18.05.2017
 * Time: 17:05
 */

$countUser = CUser::GetCount();

$order = array('sort' => 'asc');
$tmp = 'sort'; // параметр проигнорируется методом, но обязан быть
$rsUsers = CUser::GetList($order, $tmp);


while($arUsID = $rsUsers->Fetch()) {
    $rsUser = CUser::GetByID($arUsID['ID']);
    $arUser = $rsUser->Fetch();

    if ($arUser['NAME'] == '' && $arUser['UF_NAME'] == ''){
        echo 'не 1 и не 2<br>';
        echo '----<br>';
    }else if ($arUser['NAME'] == '' && $arUser['UF_NAME'] != ''){
        echo 'не 1 и 2<br>';
        echo '----<br>';
    }else if ($arUser['NAME'] != '' && $arUser['UF_NAME'] == ''){
        echo '1 и не 2<br>';
        echo '----<br>';
    }else if ($arUser['NAME'] != '' && $arUser['UF_NAME'] != ''){
        echo '1 и 2<br>';
        echo '----<br>';
    }



//echo "<pre>"; print_r($arUser); echo "</pre>";
    /*echo "[" . $arUser['ID'] . "]: " . $arUser['UF_NAME'] . "- " . $arUser['UF_PATRONYMIC'] . " - " .
        $arUser['UF_FAM'] . " - " . $arUser['UF_PHONE'] . " <br>";*/

};