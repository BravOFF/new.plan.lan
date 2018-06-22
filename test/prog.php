<?php
/**
 * Created by PhpStorm.
 * User: BravovRM
 * Date: 19.03.2018
 * Time: 8:27
 */


//https://syn.su/testwork.php

function getMessage($url, $props){

	if($curl = curl_init()){
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $props);
//		curl_setopt($curl, CURLOPT_POSTFIELDS, 'method=get');

		$out = curl_exec($curl);
		curl_close($curl);

	}else{
		$out = 'err';
	}
	return $out;
}

print_r(getMessage('https://syn.su/testwork.php', 'method=get'));

function xor_bytes($data , $key){
	$l = strlen($data);
	$k = strlen($key);
	$r = '';
	for($i = 0; $i < $l; $i++){
		$r .= $data[$i] ^ $key[$i % $k];
	}
	return $r;
}

echo base64_encode(xor_bytes('synergy.ru' , 'JasdjiYlaq3'));