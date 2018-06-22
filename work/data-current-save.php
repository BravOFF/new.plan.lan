<?php
/**
 * Created by PhpStorm.
 * User: BravovRM
 * Date: 12.05.2017
 * Time: 8:56
 */
if($_POST['data']){
$arrayData = $_POST['data'];
}else {
    $arrayData = array();
}
//print_r(json_encode($arrayData));


$local_file = "data-test.json";
$fp = fopen($local_file, 'a');
ftruncate($fp, 0);
//echo json_encode($arrayData);

fwrite($fp, json_encode($arrayData));
fclose($fp);