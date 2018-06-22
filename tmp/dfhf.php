
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $curDir = $APPLICATION->GetCurDir(true);?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
    <?$APPLICATION->ShowHead();?>
    <title><?$APPLICATION->ShowTitle()?></title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    <script src="/bitrix/templates/rps/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
    <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script src="/bitrix/templates/rps/js/jquery-smUI.js"></script>
    <script src="/bitrix/templates/rps/js/js.js?v=4.11"></script>
    <script>
        var PIDINIT=0;
    </script>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="true">
    <meta property="og:locale" 		content="ru_RU" />
    <meta property="og:type" 		content="website" />
    <meta property="og:site_name" 	content="RPS"/>
    <meta property="og:url" 		content="https://rps-brand.ru<?=$curDir;?>" />
    <?if(isset($GLOBALSHARE) AND $GLOBALSHARE){?>
        <?if($GLOBALSHARE['TITLE']){?><meta property="og:title" content="<?=addslashes($GLOBALSHARE['TITLE'])?>" /><?}?>
        <?if($GLOBALSHARE['DESCRIPTION']){?><meta property="og:description" content="<?=addslashes(mb_substr(strip_tags($GLOBALSHARE['DESCRIPTION']), 0, 200, 'UTF8'))?>..." /><?}?>
        <?if($GLOBALSHARE['IMAGE']){?><meta property="og:image" content="<?=$GLOBALSHARE['IMAGE']?>" /><meta property="og:image:type" content="image/jpg" />
        <?}?>
    <?}else{?>
        <meta property="og:title" content="Сила в единстве" />
        <meta property="og:description" content="Компания RPS (Russian Power Systems) разрабатывает, выпускает и продает современную, модную и стильную одежду согласно традициям наших славянских предков." />
        <meta property="og:image" content="http://<?=$_SERVER['HTTP_HOST']?>/bitrix/templates/rps/img/share.jpg?1" />
        <meta property="og:image:type" content="image/jpg" />

    <?}?>

    <meta name="msapplication-TileColor" content="#a41001">
    <meta name="theme-color" content="#a41001">
    <meta name="viewport" content="width=device-width">
    <meta name='yandex-verification' content='730a13b430d8dd02' />
    <meta name="google-site-verification" content="3lKw-z7kCvOXL8-4mJQZyd6MQ0K6VNCZzzC57ZwDxTE" />
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-63756401-1', 'auto');
        ga('send', 'pageview');

    </script>

    <link rel="stylesheet" href="/bitrix/templates/rps/js/fancybox3/jquery.fancybox.css">
    <link rel="stylesheet" href="/bitrix/templates/rps/js/fancybox3/jquery.fancybox-thumbs.css">
    <script src="/bitrix/templates/rps/js/fancybox3/jquery.fancybox.js"></script>
    <script src="/bitrix/templates/rps/js/fancybox3/jquery.fancybox-thumbs.js"></script>
    <script src="/bitrix/templates/rps/js/jquery.maskedinput.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("a[rel='fancybox']").fancybox({
                helpers : {
                    thumbs : true
                }
            });
            $('a[rel=call]').fancybox({'autoScale':false, 'width':405, 'height':340, 'showNavArrows':false,openEffect  : 'fade', closeEffect : 'fade', nextEffect  : 'none', prevEffect  : 'none'});
            /* masked input */
            $('#callbackPhone').mask("+7(999) 999-99-99");
        });
    </script>



    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','//connect.facebook.net/en_US/fbevents.js');

        fbq('init', '886995688040905');
        fbq('track', "PageView");</script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=886995688040905&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->


    <script type="text/javascript" src="/ds-comf/ds-form/js/dsforms.js"></script>
    <script type="text/javascript" src="/bitrix/templates/rps/js/countdown.js"></script>
    <script charset="UTF-8" src="//cdn.sendpulse.com/28edd3380a1c17cf65b137fe96516659/js/push/969d320d43312eb98f9d016bd8fe7519_0.js" async></script>

</head>
<body itemscope itemtype="http://schema.org/Organization">
<meta content="RPS" itemprop="name">
<meta content="м. Авиамоторная Авиамоторная дом. 50, стр. 1, офис 210" itemprop="address">
<meta content="https://rps-brand.ru/bitrix/templates/rps/img/logo1.png" itemprop="logo">


<div class="bBody body_wrapper">
    <div class="page-block">
        <?$APPLICATION->ShowPanel()?>
        <div class="bHeaderLine">
            <div class="sm-container sm-row">
                <div class="sm-col mailBlock" itemprop="email"><a href="mailto:info@rps-brand.ru">info@rps-brand.ru</a></div>
                <div class="sm-col adress"><a href="/contacts/">Адреса магазинов</a></div>
                <div class="sm-col phone">
                    <?$APPLICATION->IncludeFile(
                        SITE_DIR."inc/.inc.text38.php",
                        Array(),
                        Array("MODE"=>"html", "TEMPLATE"=>SITE_DIR."inc/.inc.php")
                    );?>
                </div>
                <div class="sm-col search">
                    <form method="get" action="/search">
                        <input type="text" name="q" sm-placeholder="Поиск по сайту"/>
                        <a href="" class="ico"></a>
                    </form>
                </div>
                <div class="sm-col-r buttons">
                    <div class="social">
                        <a href="http://vk.com/rpsbrand" id="vk"></a>
                        <a href="https://www.facebook.com/rpsbrand.ru" id="fb"></a>
                        <a href="https://www.instagram.com/rpsbrand.ru/" id="in"></a>
                    </div>
                    <div class="sm-col loginbasket">
                        <?if(!$USER->GetID()){?>
                            <a href="javascript:void(0)" onclick="showPopup('popupLogin')" class="login">Войти</a> / <a href="javascript:void(0)" onclick="showPopup('popupReg')" class="reg">Регистрация</a>
                        <?}else{?>
                            <a href="/personal/" class="profile">Профиль</a>/<a href="/personal/logout/" class="login">Выйти</a>
                        <?}?>
                    </div>
                    <div class="sm-col basket">
                        <a href="/order" class="sm-row">
                            <div class="sm-col ico"></div>
                            <div class="sm-col">
                                <div class="title"><span id="cartProductCount"></span></div>
                                <!--<div class="sum" id="cartProductSum"></div>-->
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bHeader">
            <div class="sm-container sm-row">
                <a href="/" class="sm-col logo"></a>
                <div class="sm-col menu" itemscope itemtype="https://schema.org/SiteNavigationElement">
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "rps_top", array(
                        "ROOT_MENU_TYPE" => "top",
                        "MENU_CACHE_TYPE" => "Y",
                        "MENU_CACHE_TIME" => "36000000",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array()
                    ),
                        false
                    );?>
                </div>
                <div class="sm-col-r phonecontact">
                    <a href="/order" class="callback">Корзина <span id="new_top_kor"></span></a>
                </div>

            </div>
        </div>
        <?if($APPLICATION->getCurDir()!='/'){?>
            <div class="bBreadcrumbs nof">
                <div class="sm-container">
                    <div class="hider"><div class="w">
                            <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "rps", array(),
                                false
                            );?>
                        </div></div>
                </div>
            </div>
        <?}?>


teertretetet

<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
</div>
<div class="bBodyPad"></div>
<div class="bFooter">
    <div class="sm-container">
        <div class="sm-row">
            <div class="sm-col">
                <div class="menu">
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "rps_footer", array(
                        "ROOT_MENU_TYPE" => "footer4",
                        "MENU_CACHE_TYPE" => "Y",
                        "MENU_CACHE_TIME" => "36000000",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array()
                    ),
                        false
                    );?>
                </div>
            </div>
            <div class="sm-col">
                <div class="menu">
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "rps_footer", array(
                        "ROOT_MENU_TYPE" => "footer2",
                        "MENU_CACHE_TYPE" => "Y",
                        "MENU_CACHE_TIME" => "36000000",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array()
                    ),
                        false
                    );?>
                </div>
            </div>
            <div class="sm-col">
                <div class="menu">
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "rps_footer", array(
                        "ROOT_MENU_TYPE" => "footer3",
                        "MENU_CACHE_TYPE" => "Y",
                        "MENU_CACHE_TIME" => "36000000",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array()
                    ),
                        false
                    );?>
                </div>
            </div>
            <div class="sm-col" style="    margin-top: 25px;">
                <div class="menu">
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "rps_footer", array(
                        "ROOT_MENU_TYPE" => "footer1",
                        "MENU_CACHE_TYPE" => "Y",
                        "MENU_CACHE_TIME" => "36000000",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array()
                    ),
                        false
                    );?>
                </div>
            </div>
            <div class="sm-col-r phonecontact">
                <div class="mail-footer"><a href="mailto:info@rps-brand.ru" id="foot_lnk"><span>info@rps-brand.ru</span></a><a id="foot_adr" href="/contacts/"><span>Адреса магазинов</span></a></div>
                <div class="phone_f">
                    <?$APPLICATION->IncludeFile(
                        SITE_DIR."inc/.inc.text35.php",
                        Array(),
                        Array("MODE"=>"html", "TEMPLATE"=>SITE_DIR."inc/.inc.php")
                    );?><br>
                    <a href="javascript:void(0)" onclick="showPopup('popupCallback')" class="gA1">Заказать звонок</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div  class="copyright"><div class="sm-container">© 2015—2016 «free&amp;strong»</div></div>
<div class="sm-popup-bg" onclick="closePopup()"></div>
<div class="sm-popup" id="popupReg">
    <a href="javascript:void(0)" onclick="closePopup()" class="close"></a>
    <div class="title">регистрация</div>
    <div class="form"><form onsubmit="if(!reg()) return false;">

            <div class="sm-row tReg">
                <div class="item sm-col"><input type="radio" sm-field="1" sm-class="gRadio" name="regTab" id="rtab1" checked="checked"><label for="rtab1">покупатель</label></div>
                <div class="item sm-col"><input type="radio" sm-field="1" sm-class="gRadio" name="regTab" id="rtab2"><label for="rtab2">оптовик</label></div>
            </div>

            <div class="text jsUser">
                Зарегистрируйтесь, и у вас появится личный кабинет,
                где можно просматривать статусы и историю заказов, указать адрес доставки и контактную информацию, чтобы не вводить
                ее при совершении заказов.
            </div>
            <div class="text jsOpt">
                Зарегистрируйтесь и получите доступ к оптовым ценам
                и каталогу.
            </div>

            <div class="sm-row input">
                <div class="sm-col ftitle">
                    Фамилия
                </div>
                <div class="sm-col">
                    <input type="text" id="regFam"/>
                </div>
            </div>
            <div class="sm-row input">
                <div class="sm-col ftitle">
                    имя*
                </div>
                <div class="sm-col">
                    <input type="text" id="regName"/>
                </div>
            </div>
            <div class="sm-row input">
                <div class="sm-col ftitle">
                    отчество
                </div>
                <div class="sm-col">
                    <input type="text" id="regOtch"/>
                </div>
            </div>
            <div class="sm-row input">
                <div class="sm-col ftitle">
                    телефон*
                </div>
                <div class="sm-col">
                    <input type="text" id="regPhone"/>
                </div>
            </div>
            <div class="sm-row input">
                <div class="sm-col ftitle">
                    E-mail*
                </div>
                <div class="sm-col">
                    <input type="text" id="regEmail"/>
                </div>
            </div>
            <div class="sm-row input jsOpt">
                <div class="sm-col ftitle mmt">
                    Название<br/>
                    компании*
                </div>
                <div class="sm-col">
                    <input type="text" id="regComp"/>
                </div>
            </div>


            <div class="sm-row input mt jsOpt">
                <div class="sm-col ftitle">
                    Город*
                </div>
                <div class="sm-col">
                    <input type="text" id="regCity"/>
                </div>
            </div>
            <div class="sm-row input jsOpt">
                <div class="sm-col ftitle">
                    Адрес*
                </div>
                <div class="sm-col">
                    <input type="text" id="regAddress"/>
                </div>
            </div>

            <div class="sm-row input mt">
                <div class="sm-col ftitle">
                    пароль*
                </div>
                <div class="sm-col">
                    <input type="password" id="regPassword"/>
                </div>
            </div>
            <div class="sm-row input">
                <div class="sm-col ftitle mmt">
                    пароль<br/>еще раз*
                </div>
                <div class="sm-col">
                    <input type="password" id="regPassword2"/>
                </div>
            </div>
            <div class="sm-row submit">
                <div class="sm-col err" id="regErr">
                    <span class="text"></span><br/>
                    Проверьте правильность<br/>
                    данных и попробуйте снова
                </div>
                <div class="sm-col-r">
                    <a href="javascript:void(0)" onclick="reg()" class="gBtn2">регистрация</a>
                </div>
            </div>
            <div class="text2">
                * Звездочкой отмечены поля,<br/>
                &nbsp;&nbsp;&nbsp;обязательные для заполнения
            </div>
        </form></div>
</div>
<div class="sm-popup" id="popupLogin">
    <a href="javascript:void(0)" onclick="closePopup()" class="close"></a>
    <div class="title">авторизация</div>
    <div class="form"><form onsubmit="if(!login()) return false;">
            <div class="sm-row input">
                <div class="sm-col ftitle">
                    E-mail
                </div>
                <div class="sm-col">
                    <input type="text" id="loginEmail"/>
                </div>
            </div>
            <div class="sm-row input">
                <div class="sm-col ftitle">
                    пароль
                </div>
                <div class="sm-col">
                    <input type="password" id="loginPassword"/>
                </div>
            </div>
            <div class="repass"><a href="javascript:void(0)" onclick="closePopup(); showPopup('popupRepass')" class="gA1">Забыли пароль?</a></div>
            <div class="sm-row submit">
                <div class="sm-col err" id="loginErr">
                    <span class="text"></span><br/>
                    Проверьте правильность<br/>
                    данных и попробуйте снова
                </div>
                <div class="sm-col-r">
                    <a href="javascript:void(0)" onclick="login()" class="gBtn2">войти</a>
                </div>
            </div>
        </form></div>
</div>
<div class="sm-popup" id="popupRepass">
    <a href="javascript:void(0)" onclick="closePopup()" class="close"></a>
    <div class="title">Восстановить пароль</div>
    <div class="form"><form onsubmit="if(!rePass()) return false;">
            <div class="text">
                Пожалуйста, введите e-mail, который вы указывали<br/>
                при регистрации. Мы вышлем на него дальнейшие<br/>
                инструкции по смене пароля
            </div>
            <div class="sm-row input">
                <div class="sm-col ftitle">
                    E-mail
                </div>
                <div class="sm-col">
                    <input type="text" id="RepassEmail"/>
                </div>
            </div>
            <div class="sm-row submit">
                <div class="sm-col err" id="RepassErr">
                    Пользователь не найден.<br/>
                    Проверьте правильность<br/>
                    e-mail и попробуйте снова
                </div>
                <div class="sm-col-r">
                    <a href="javascript:void(0)" onclick="rePass()" class="gBtn2">восстановить</a>
                </div>
            </div>
        </form></div>
    <div class="formDone">
        <div class="sm-row">
            <div class="sm-col">
                <div class="doneIco"></div>
            </div>
            <div class="sm-col text">
                На ваш e-mail было отправленно<br/>
                письмо с инструкцией<br/>
                по восстановлению пароля
            </div>
        </div>
    </div>
</div>
<div class="sm-popup" id="popupMailer">
    <a href="javascript:void(0)" onclick="closePopup()" class="close"></a>
    <div class="title">Подписаться на рассылку</div>
    <div class="form">
        <div class="sm-row input">
            <div class="sm-col ftitle">
                E-mail
            </div>
            <div class="sm-col">
                <form onsubmit="if(!sendEmail()) return false;"><input type="text" id="mailerEmail"/></form>
            </div>
        </div>
        <div class="sm-row submit">
            <div class="sm-col err" id="mailerErr">

            </div>
            <div class="sm-col-r">
                <a href="javascript:void(0)" onclick="sendEmail()" class="gBtn2">подписаться</a>
            </div>
        </div>
    </div>
    <div class="formDone">
        <div class="sm-row">
            <div class="sm-col">
                <div class="doneIco"></div>
            </div>
            <div class="sm-col text">
                <span>Спасибо!</span>
                Вам на e-mail отправлено письмо<br/>
                со ссылкой для подтверждения
            </div>
        </div>
    </div>
</div>
<div class="sm-popup" id="popupToCart">
    <a href="javascript:void(0)" onclick="closePopup()" class="close"></a>
    <div class="title">Товар добавлен в корзину</div>
    <div class="formDone">
        <div class="sm-row">
            <div class="sm-col">
                <div class="doneIco"></div>
            </div>
            <div class="sm-col text">
                Товар добавлен в корзину
            </div>
        </div>
        <div class="btns">
            <a href="javascript:void(0)" onclick="window.location.href='/order/'" class="gBtn2">Оформить заказ</a>
            <a href="javascript:void(0)" onclick="closePopup()" class="gBtn2 c2">продолжить покупки</a>
        </div>
    </div>
</div>
<div class="sm-popup" id="popupOptWait">
    <a href="javascript:void(0)" onclick="closePopup()" class="close"></a>
    <div class="title">Заявка принята</div>
    <div class="text">
        Ваша заявка на доступ к оптовым материалам принята.<br/>
        Скоро мы свяжемся с вами.
    </div>
    <div class="btns">
        <a href="javascript:void(0)" onclick="closePopup()" class="gBtn2">закрыть</a>
    </div>
</div>
<?if(isset($_SESSION['REGOPT'])){
    unset($_SESSION['REGOPT']);?>
    <script>
        $(document).ready(function(){
            showPopup('popupOptWait');
        });
    </script>
<?}?>

<div class="sm-popup" id="mailerDone">
    <a href="javascript:void(0)" onclick="closePopup()" class="close"></a>
    <div class="title">Подписка подтверждена</div>
    <div class="formDone">
        <div class="sm-row">
            <div class="sm-col">
                <div class="doneIco"></div>
            </div>
            <div class="sm-col text">
                Теперь вы будите получать от нас уведомления о новинках и акциях
            </div>
        </div>
    </div>
</div>
<script>
    var SHOWMAILERDONE=0;
    <?if(isset($GLOBALCONFIG['SHOWMAILERCONFIRMED']) AND $GLOBALCONFIG['SHOWMAILERCONFIRMED']){?>
    SHOWMAILERDONE=1;
    <?}?>
</script>

<div class="sm-popup" id="popupOrderCancel">
    <a href="javascript:void(0)" onclick="closePopup()" class="close"></a>
    <div class="title">Отмена заказа</div>

    <div class="text">
        Вы уверены, что хотите отменить заказ?
    </div>
    <div class="btns">
        <div class="sm-row">
            <div class="sm-col"><div class="sm-pad"><a href="javascript:void(0)" onclick="cancelOrder()" class="gBtn2">Да</a></div></div>
            <div class="sm-col"><div class="sm-pad"><a href="javascript:void(0)" onclick="closePopup()" class="gBtn2 c2">Нет</a></div></div>
        </div>
    </div>

</div>

<div class="sm-popup" id="popupCallback">
    <a href="javascript:void(0)" onclick="closePopup('popupCallback')" class="close"></a>
    <div class="form">
        <div class="title">Заказать звонок</div>
        <form onsubmit="if(!callback()) return false;" class="callback-form">
            <div class="sm-row input">
                <div class="ftitle">
                    Ваше имя
                </div>
                <div class="sm-col finput">
                    <input type="text" id="callbackName"/>
                </div>
            </div>
            <div class="sm-row input">
                <div class="ftitle">
                    Ваш телефон*
                </div>
                <div class="sm-col finput">
                    <input type="text" id="callbackPhone" placeholder="+7 ( ___ ) ___ - __ - __"/>
                </div>
            </div>
            <div class="sm-row submit">
                <div class="sm-col err" id="callbackErr">

                </div>
                <div class="callback-info">Поля, отмеченные «*», являются обязательными для заполнения.</div>
                <div>
                    <a href="javascript:void(0)" onclick="callback()" class="gBtn2">Отправить</a>
                </div>
            </div>
        </form></div>
    <div class="formDone">
        <div class="sm-row">
            <div class="sm-col text">
                <span>Спасибо!</span> Ваш запрос успешно отправлен.<br>Наш специалист свяжется с Вами в ближайшее время.
            </div>
        </div>
    </div>
</div>
<div class="sm-popup np" id="popupProduct">
    <a href="javascript:void(0)" onclick="closePopup()" class="close"></a>
    <div class="load"></div>
</div>

<?if(isset($GLOBALPOPUPMAPS) AND $GLOBALPOPUPMAPS)
    foreach($GLOBALPOPUPMAPS as $k=>$value){?>
        <div class="sm-popup np popupMap" id="popupMap<?=$k?>">
            <a href="javascript:void(0)" onclick="closePopup()" class="close"></a>
            <?=$value?>
        </div>
    <?}?>
<div class="sm-popup" id="popupMySize">
    <a href="javascript:void(0)" onclick="closePopup('popupMySize')" class="close"></a>
    <div class="title">Таблица размеров</div>

    <?$APPLICATION->IncludeFile(
        SITE_DIR."inc/.inc.text64.php",
        Array(),
        Array("MODE"=>"html", "TEMPLATE"=>SITE_DIR."inc/.inc.php")
    );?>


</div>
</div>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter29155235 = new Ya.Metrika({id:29155235,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/29155235" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<!-- BEGIN JIVOSITE CODE {literal} -->
<!-- 		<script type='text/javascript'>
		(function(){ var widget_id = 'aCR65vWSZN';
		var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script> -->
<!-- {/literal} END JIVOSITE CODE -->


<script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=lUJz7n*HluPsSmvGB*B953KnKZq05x97H5d8qo/K2*c8BooxCcfuvMNebOkPxc9QpPV2FDkoj6D/bANXhFLNqAfOioInLG56nu*toHSRakjpJhAxXtTsZxHkRg3y0Ogckrt9KLW5LUBSGZlEzqDXEvGHCGwLcDtd2isNcpFwumQ-';</script>
<script type="text/javascript">
    $(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() != 0) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });
        $('#toTop').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
        });
    });

</script>
<div id="toTop"><span></span></div>
</body>
</html>