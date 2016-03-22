<?php 
header("Content-type:text/html; Charset=utf-8");
error_reporting(0);


$url_k = "http://www.huashengyoo.com/ssmp/searchapi.php"; 
$doc_k = new DOMDocument(); 
$doc_k->load($url_k); 
$totalpage = $doc_k->getElementsByTagName("totalpage")->item(0)->nodeValue;
$totalresult = $doc_k->getElementsByTagName("totalresult")->item(0)->nodeValue;
//$totalpage = 1;
$file = "data.json";
unlink($file);

$dataresult = array();
for($i=0;$i<$totalpage;$i++){ 
	$pagesize = 10;
	$pageno = $i + 1;
	$url = "http://www.huashengyoo.com/ssmp/searchapi.php?pagesize=".$pagesize."&pageno=".$pageno; 
	$content = file_get_contents($url);
	$doc = new DOMDocument(); 
	$doc->load($url); 
	$humans = $doc->getElementsByTagName("listview")->item(0)->childNodes;
	foreach( $humans as $k=>$human ) 
	{ 
		$newarry = array();
		$aid = $human->getElementsByTagName("aid")->item(0)->nodeValue;
		$spotname = $human->getElementsByTagName("spotname")->item(0)->nodeValue;
		$litpic = $human->getElementsByTagName("litpic")->item(0)->nodeValue; 
		$getway = $human->getElementsByTagName("getway")->item(0)->nodeValue;
		$sellpoint = $human->getElementsByTagName("sellpoint")->item(0)->nodeValue;
		$add = $human->getElementsByTagName("address")->item(0)->nodeValue;
		$address = explode('|',$add);
		$spotteam = $human->getElementsByTagName("spotteam")->item(0)->nodeValue;
		$ticketdescription = $human->getElementsByTagName("ticketdescription")->item(0)->nodeValue;
		$fieldintroduction = $human->getElementsByTagName("fieldintroduction")->item(0)->nodeValue;
		$howtoarrive = $human->getElementsByTagName("howtoarrive")->item(0)->nodeValue;
		$arenaseats = $human->getElementsByTagName("arenaseats")->item(0)->nodeValue;
		$howtopay = $human->getElementsByTagName("howtopay")->item(0)->nodeValue;
		$ticketmethod = $human->getElementsByTagName("ticketmethod")->item(0)->nodeValue;

		$listlength = $human->getElementsByTagName("list")->length;
		$newlistall = array();
		for($i=0;$i<$listlength;$i++){ 
			$newlist = array();
			$lists = $human->getElementsByTagName("list")->item($i)->childNodes; 
			$newlist = array(
				'aid' => $lists->item(0)->nodeValue,
				'title' => $lists->item(1)->nodeValue,
				'price' => $lists->item(2)->nodeValue,
				'number' => $lists->item(3)->nodeValue,		
			);
			array_push($newlistall,$newlist);
		}
		$newarry = array(
			'aid' => $aid,
			'spotname' => $spotname,
			'litpic' => $litpic,
			'getway' => $getway,
			'sellpoint' => $sellpoint,
			'address' => $address,
			'spotteam' => $spotteam,
			'ticketdescription' => $ticketdescription,
			'fieldintroduction' => $fieldintroduction,
			'howtoarrive' => $howtoarrive,
			'arenaseats' => $arenaseats,
			'howtopay' => $howtopay,
			'ticketmethod' => $ticketmethod,
			'list' => $newlistall,
		);
		array_push($dataresult,$newarry);
	} 
}
//var_dump($dataresult);
$data = json_encode($dataresult);
$fp = fopen("data.json","w+");
fwrite($fp,$data);
fclose($fp);
if($fp){
	echo "成功！</br>";
}else{
	echo "失败！</br>";
}
?> 
