<?php 
header("Content-type:text/html; Charset=utf-8");
error_reporting(0);


$url_k = "http://www.huashengyoo.com/ssmp/searchapi.php"; 
$doc_k = new DOMDocument(); 
$doc_k->load($url_k); 
$totalpage = $doc_k->getElementsByTagName("totalpage")->item(0)->nodeValue;
$totalresult = $doc_k->getElementsByTagName("totalresult")->item(0)->nodeValue;

$file = "data.xml";
unlink($file);

$pagesize = $totalresult;
$pageno = 1;
$url = "http://www.huashengyoo.com/ssmp/searchapi.php?pagesize=".$pagesize."&pageno=".$pageno; 
$content = file_get_contents($url);
$fp = fopen("data.xml","a+");
fwrite($fp,$content);
fclose($fp);
if($fp){
	echo "同步成功！</br>";
}else{
	echo "同步失败！</br>";
}
?> 
