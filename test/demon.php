<?php
/**
 * Created by PhpStorm.
 * User: BravovRM
 * Date: 19.03.2018
 * Time: 10:09
 */

$stop = false;

define('E_MAIL_ERROR','r@13ip.ru');
define('LOG_F', dirname(__FILE__).'/log.txt');
$url = 'https://syn.su/testwork.php';
$messege = array();
print_r(LOG_F);

function xor_bytes($data , $key){
	$l = strlen($data);
	$k = strlen($key);
	$r = '';
	for($i = 0; $i < $l; $i++){
		$r .= $data[$i] ^ $key[$i % $k];
	}
	return $r;
}
function getMessage($url, $props){
	$sendmessege = file_get_contents(LOG_F);
	if($curl = curl_init()){
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $props);
		$out = curl_exec($curl);
		curl_close($curl);
		$out = json_decode($out, true);
	}else{
		$out = array(
			'response' => NULL,
			'errorCode' => 'arr',
			'errorMessage' => 'Fail curl_init'
		);

	}
	if ($out['response'] == NULL) {
		switch ($out['errorCode']) {
			case '15':
				$sendmessege .= 'Код 15 – Нет такого метода';
				break;
			case '20':
				$sendmessege .= 'Код 20 – Пустое значение параметра message';
				break;
			case '10':
				$sendmessege .= 'Код 10 – Не получилось расшифровать строку';
				break;
			case 'arr':
				$sendmessege .= 'Код err – curl_init';
				break;
		}
		$sendmessege .= "['response'] == NULL ".$out['errorCode'];
		file_put_contents(LOG_F, $sendmessege.'\r\n');
		mail(E_MAIL_ERROR, "Ошибка с кодом ".$out['errorCode'], $sendmessege);
		$stop = true;
		exit(1);
	}
	return $out;
}





/**
 * pcntl_fork() - данная функция разветвляет текущий процесс
 */
$pid = pcntl_fork();
if ($pid == -1) {
	/**
	 * Не получилось сделать форк процесса, о чем сообщим в консоль
	 */
	die('Error fork process' . PHP_EOL);
} elseif ($pid) {
	/**
	 * В эту ветку зайдет только родительский процесс, который мы убиваем и сообщаем об этом в консоль
	 */
	die('Die parent process' . PHP_EOL);
} else {
	/**
	 * Бесконечный цикл
	 */
	while(!$stop) {
		$messege = getMessage($url, 'method=get');
		$key = base64_encode(xor_bytes($messege['response']['message'], $messege['response']['key']));
		$messege = getMessage($url, 'method=update&message='.$key);
		if($messege['response'] == "Success"){
//	mail(E_MAIL_ERROR, $messege['response'], $messege['response']);
			$sendmessege = file_get_contents(LOG_F);
			$sendmessege .= $messege['response'].'\r\n';
			file_put_contents(LOG_F, $sendmessege);
			$stop = false;
		}

		sleep(6);
	}
}
/**
 * Установим дочерний процесс основным, это необходимо для создания процессов
 */
posix_setsid();