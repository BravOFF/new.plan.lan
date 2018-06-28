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
//		print_r(($k+1).' - ');
//	print_r($myrow[$k]['DateTime']);
//	print_r(json_decode($myrow[$k]['DateTime'], true));

//	echo '</pre>';
}
//	echo '<pre>';
//	print_r($myrow);
//	echo '</pre>';

//	echo '<pre>';
	echo json_encode($myrow, JSON_UNESCAPED_UNICODE);
//	echo '</pre>';
}

if ($_REQUEST['m'] == 'add') {
	$DateTime = '[{"UID":"1","Name":"Главная точка","Period":"","type":"dot","Parent_UID":"","SORT":"100"},{"UID":"2","Name":"Линия","Period":"30","type":"line","Parent_UID":"1","SORT":"200"}]';
	$result = mysql_query ("INSERT INTO plan_db.list_plan (Name, Date, DateTime, NameMenu) VALUES ('Новый график', '28.06.2018', '$DateTime', 'Новый график');");
	if ($result == 'true') {
		$id =  mysql_insert_id();
		echo json_encode(['success' => 'true', 'id' => $id]);
	} else {
		echo json_encode(['success' => 'false']);
	}
}

if ($_REQUEST['m'] == 'del') {
	if ($_REQUEST['id']) {
		$id = $_REQUEST['id'];
		$result = mysql_query ("DELETE FROM plan_db.list_plan WHERE id='$id'");
		if ($result == 'true') {
			echo json_encode(['success' => 'true']);
		} else {
			echo json_encode(['success' => 'false']);
		}
	}else{
		echo json_encode(['success' => 'false']);
	}
}

if ($_REQUEST['m'] == 'update') {
	if ($_REQUEST['data']) {

		$id = $_REQUEST['data'][0]['IdPlan'];
		$name = $_REQUEST['data'][0]['Name'];
		$date = $_REQUEST['data'][0]['Date'];

		$DT = $_REQUEST['data'][0]['DateTime'];

		foreach ($DT as $k => $v){
			$DT[$k]['Name'] = htmlspecialchars($v['Name'], ENT_QUOTES);
		}

		$datetime = json_encode($DT, JSON_UNESCAPED_UNICODE );
		$namemenu = $_REQUEST['data'][0]['NameMenu'];
//		print_r($datetime);
//		$result = mysql_query ("UPDATE plan_db.list_plan SET Name='$name', Date='$date', DateTime='$datetime' WHERE id='$id'");
		$result = mysql_query ("UPDATE plan_db.list_plan SET Name='$name', Date='$date', DateTime='$datetime', NameMenu='$namemenu' WHERE id='$id'");
		if ($result == 'true')
		{
			echo "Данные успешно обновлены.";
		}
		else
		{
			echo "Данные не обновлены!";
		}
	}
}