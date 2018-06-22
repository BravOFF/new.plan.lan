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
//print_r(json_encode($arrayData));


$local_file = "data-etalon-test.json";
$fp = fopen($local_file, 'a');
ftruncate($fp, 0);
//echo json_encode($arrayData);

fwrite($fp, json_encode($arrayData));
fclose($fp);