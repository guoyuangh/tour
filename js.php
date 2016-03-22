<?php 
header('Content-type:text/json');
error_reporting(0);
$doc = new DOMDocument(); 
$doc->load('data.xml'); 
$humans = $doc->getElementsByTagName("listview")->item(0)->childNodes;
$dataresult = array();
foreach( $humans as $k=>$human ) 
{ 
	$newarry = array();
	$aid = $human->getElementsByTagName("aid")->item(0)->nodeValue;
	$spotname = $human->getElementsByTagName("spotname")->item(0)->nodeValue;
	$litpic = $human->getElementsByTagName("litpic")->item(0)->nodeValue; 
	$getway = $human->getElementsByTagName("getway")->item(0)->nodeValue;
	$newarry = array(
		'aid' => $aid,
		'spotname' => $spotname,
		'litpic' => $litpic,
		'getway' => $getway,
	);
	array_push($dataresult,$newarry);
}
$tmp_month = empty($_POST['d']) ? date("Y-m") : $_POST['d'];
//$tmp_month = date("Y-m");
//$tmp_month = '2016-10';
foreach( $dataresult as $k=>$v ) 
{
	$curmonth = substr($v['getway'],0,7);

	if($curmonth <> $tmp_month){
	   unset($dataresult[$k]);
	}
}
if(count($endarrray) <= '28'){
    $endarrray = array_slice($dataresult,0,28);
}else{
    $endarrray = $dataresult;
}

echo json_encode($endarrray);
//print_r($endarrray);
//echo count($endarrray);


?> 
