<?php
/**
 * Created by PhpStorm.
 * User: BravovRM
 * Date: 06.04.2017
 * Time: 11:12
 */
function PR($v)
{
    echo "<pre>";
    print_r($v);
    echo "</pre>";
}

$dateStart = "20.12.2016";

$arrEtalon = array(
    "Name" => "План-график по утверждению корректировки ФЦП ГЛОНАСС",
    "DateTime" => array(
        array(
            "UID" => "1",
            "Name" => "Обнародование Федерального закона о федеральном бюджете на 2017-2019",
            "DateStart" => "",
            "type" => "dot",
            "Parent_UID" => ""
        ),
        array(
            "UID" => "2",
            "Name" => "Подготовка проекта корректировки ФЦП с учетом ФЗ о ФБ",
            "Period" => "15",
            "DateStart" => "",
            "DateStop" => "",
           "type" => "line",
            "Parent_UID" => "1"
        ),
        array(
            "UID" => "3",
            "Name" => "Согласование проекта корректировки ФЦП госзаказчиками, Минвостокразвития России, Минобрнауки России, РАН",
            "Period" => "15",
            "DateStart" => "",
            "DateStop" => "",
            "type" => "line",
            "Parent_UID" => "1"
        ),
        array(
            "UID" => "4",
            "Name" => "Предоставление ТЭО госазаказчиками в ГК Роскосмос",
            "Period" => "15",
            "DateStart" => "",
            "DateStop" => "",
            "type" => "line",
            "Parent_UID" => "1"
        ),
        array(
            "UID" => "5",
            "Name" => "Согласование проекта корректировки ФЦП ВПК России",
            "Period" => "21",
            "DateStart" => "",
            "DateStop" => "",
            "type" => "line",
            "Parent_UID" => "4"
        ),
        array(
            "UID" => "6",
            "Name" => "Согласование проекта корректировки ФЦП  Минэкономразвития России",
            "Period" => "45",
            "DateStart" => "",
            "DateStop" => "",
            "type" => "line",
            "Parent_UID" => "5"
        ),
        array(
            "UID" => "7",
            "Name" => " Согласование проекта корректировки ФЦП Минфином России",
            "Period" => "30",
            "DateStart" => "",
            "DateStop" => "",
            "type" => "line",
            "Parent_UID" => "6"
        ),
        array(
            "UID" => "8",
            "Name" => "Согласование проекта корректировки ФЦП Минюстом России",
            "Period" => "15",
            "DateStart" => "",
            "DateStop" => "",
            "type" => "line",
            "Parent_UID" => "7"
        ),
        array(
            "UID" => "9",
            "Name" => "Представление проекта корректировки ФЦП Минэкономразвития России в Правительство РФ",
            "Period" => "15",
            "DateStart" => "",
            "DateStop" => "",
            "type" => "line",
            "Parent_UID" => "8"
        ),
        array(
            "UID" => "10",
            "Name" => "Утверждение корректировки ФЦП Правительством РФ",
            "Period" => "30",
            "DateStart" => "",
            "DateStop" => "",
            "type" => "line",
            "Parent_UID" => "9"
        ),
        array(
            "UID" => "11",
            "Name" => "Выход Постановления",
            "DateStart" => "",
            "type" => "dot",
            "Parent_UID" => "10"
        ),
        array(
            "UID" => "12",
            "Name" => "Внесение изменений в сводную бюджетную роспись",
            "Period" => "21",
            "DateStart" => "",
            "DateStop" => "",
            "type" => "line",
            "Parent_UID" => "5"
        ),
        array(
            "UID" => "13",
            "Name" => "Внесение в коллегию ВПК предложений о внесении изменений в ГОЗ 2017 ",
            "Period" => "30",
            "DateStart" => "",
            "DateStop" => "",
            "type" => "line",
            "Parent_UID" => "12"
        ),
        array(
            "UID" => "14",
            "Name" => "Одобрение коллегией ВПК изменений в ГОЗ на основании проекта корректировки",
            "DateStart" => "",
            "type" => "dot",
            "Parent_UID" => "13"
        )
    )
);

function raschetDat($dateStart, $arrEtalon)
{

    $arrRaschetDat = array();

    /*
     * TODO: написать функцию которая расчитывает даты по периодам
     * */


    return $arrRaschetDat;
}

/*
 * Сохраняем результат в переменную
 * */
$res = raschetDat($dateStart, $arrEtalon);


// Выводим результат на экран
PR($res);