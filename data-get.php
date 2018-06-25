<?php
/**
 * Created by PhpStorm.
 * User: BravovRM
 * Date: 25.06.2018
 * Time: 15:33
 */
header("Content-Type: text/html; charset=utf-8");

/*Подключаемся к БД*/
$db = mysql_connect('localhost','root','');
mysql_query("set names 'utf8'");
mysql_select_db('plan_db', $db);
/*Делаем запрос к БД*/

if ($_REQUEST['m'] == 'all') {
	$result = mysql_query("SELECT * FROM list_plan", $db);
	/*Преобразовываем результат в массив*/
//$myrow = mysql_fetch_assoc($result);
	while ($row = mysql_fetch_assoc($result)) {
		$myrow[] = $row;
	}
foreach ($myrow as $k => $v){

	$myrow[$k]['DateTime'] = json_decode($myrow[$k]['DateTime']);
//		echo '<pre>';
//	print_r($myrow[$k]['DateTime']);
//	echo '</pre>';
}

//	echo '<pre>';
	echo json_encode($myrow);
//	echo '</pre>';
}