<?php
/**
 * Created by PhpStorm.
 * User: BravovRM
 * Date: 17.08.2017
 * Time: 12:46
 */



//title: del more_photo in catalog

// ID инфоблока с товарами

CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
CModule::IncludeModule("sale");

$IBlockCatalog = 3;
$ID = 4173;

CIBlockElement::SetPropertyValuesEx($ID, $IBlockCatalog, array('MORE_PHOTO' => array(false)));


$arSort= Array("ID"=>"ASC");
$arSelect = Array("ID");
$arSelect2 = Array("ID", "PROPERTY_PRODUCT");

$db_res = CCatalogProduct::GetList(
    $arSort,
    array("TYPE" => "3", "ELEMENT_IBLOCK_ID" => "3"),
    false,
    false, false, $arSelect
);
while ($ar_res = $db_res->Fetch())
{
    echo $ar_res["ID"]."<br>";


    $ind++;
}
echo '<br>_________<br>';
echo $ind++;