<?php 
header("Content-type:text/html; Charset=utf-8");
error_reporting(0);

$fn = 'index.html';
$url= 'http://127.0.0.1/tour/home.php';//注意
$content = file_get_contents($url);
$fs=fopen($fn,'w');
fwrite($fs,$content);
if($fs){
	echo "生成成功！</br>";
}else{
	echo "生成失败！</br>";
}
?>