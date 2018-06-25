<?php
/**
 * Created by PhpStorm.
 * User: BravovRM
 * Date: 01.06.2017
 * Time: 8:34
 */

if($_POST['data']){
    $arrayData = $_POST['data'];
}else {
    $arrayData = array();
}

//$t = json_encode($arrayData);
//$arrayData[0]['DateTime'] = json_encode($arrayData[0]['DateTime']);
//print_r($arrayData[0]);


$local_file = "data-etalon-test.json";
$fp = fopen($local_file, 'a');
ftruncate($fp, 0);
//echo json_encode($arrayData);

fwrite($fp, json_encode($arrayData));
fclose($fp);