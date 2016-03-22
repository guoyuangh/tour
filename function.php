<?php 
function backtour($pagesize,$pageno ){
	//$pagesize = 4;
	//$pageno = 1;
	$pagesize = empty($pagesize) ? 1 : $pagesize;
	$pageno = empty($pageno) ? 1 : $pageno;
	//$url = "http://www.huashengyoo.com/ssmp/searchapi.php?pagesize=".$pagesize."&pageno=".$pageno; 
    $url = 'data.xml';
	$doc = new DOMDocument(); 
	$doc->load($url); 
	$humans = $doc->getElementsByTagName("listview")->item(0)->childNodes;
	$totalpage = $doc->getElementsByTagName("totalpage")->item(0)->nodeValue;
	$totalresult = $doc->getElementsByTagName("totalresult")->item(0)->nodeValue;

	$dataresult = array();
	foreach( $humans as $k=>$human ) 
	{ 
		if($k >=0 && $k<=4 && $pageno == 1){
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
					'id' => $aid,
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

		}elseif($k >4 && $k<=9 && $pageno == 2){
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
					'id' => $aid,
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
		}else{
			continue;
		}
	} 
	return $dataresult;
}


function  backlist($page,$attrid,$kindid,$dest){
	$pagesize = 5;
	$url = "http://www.huashengyoo.com/ssmp/searchapi.php?pagesize=".$pagesize."&pageno=".$page."&dest_id=".$dest."&kindid=".$kindid."&attrid=".$attrid; 
    //$url = 'data.xml';
	$doc = new DOMDocument(); 
	$doc->load($url); 
	$humans = $doc->getElementsByTagName("listview")->item(0)->childNodes;
	$totalpage = $doc->getElementsByTagName("totalpage")->item(0)->nodeValue;
	$pagesize = $doc->getElementsByTagName("pagesize")->item(0)->nodeValue;

	$dataresult = array();
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
			$newlistall = array();
			for($i=0;$i<2;$i++){ 
				$newlist = array();
				$lists = $human->getElementsByTagName("list")->item($i)->childNodes; 
				$newlist = array(
					'id' => $aid,
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
				'totalpage' => $totalpage,
				'pagesize' => $pagesize,
				'list' => $newlistall,
			);
			array_push($dataresult,$newarry);			


	} 
	return $dataresult;
}


function  backsearch($page,$keyword,$dest){
	$pagesize = 5;
	$url = "http://www.huashengyoo.com/ssmp/searchapi.php?pagesize=".$pagesize."&pageno=".$page."&dest_id=".$dest."&kindid=".$kindid."&attrid=".$attrid."&keyword=".$keyword; 
    //$url = 'data.xml';
	$doc = new DOMDocument(); 
	$doc->load($url); 
	$humans = $doc->getElementsByTagName("listview")->item(0)->childNodes;
	$totalpage = $doc->getElementsByTagName("totalpage")->item(0)->nodeValue;
	$pagesize = $doc->getElementsByTagName("pagesize")->item(0)->nodeValue;

	$dataresult = array();
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
			$newlistall = array();
			for($i=0;$i<2;$i++){ 
				$newlist = array();
				$lists = $human->getElementsByTagName("list")->item($i)->childNodes; 
				$newlist = array(
					'id' => $aid,
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
				'totalpage' => $totalpage,
				'pagesize' => $pagesize,
				'list' => $newlistall,
			);
			array_push($dataresult,$newarry);			


	} 
	return $dataresult;
}

function backtype(){
	//$url = "http://www.huashengyoo.com/ssmp/searchapi.php?pagesize=".$pagesize."&pageno=".$pageno; 
    $url = 'data.xml';
	$doc = new DOMDocument(); 
	$doc->load($url); 
	$humans = $doc->getElementsByTagName("dest_id")->item(0)->childNodes;
	$dataresult = array();
	foreach( $humans as $k=>$human ) 
	{ 
			$newarry = array();
			$id = $human->getElementsByTagName("id")->item(0)->nodeValue;
			$dest = $human->getElementsByTagName("dest")->item(0)->nodeValue;
			$newarry = array(
				'id' => $id,
				'dest' => $dest,
			);
			array_push($dataresult,$newarry);			
	} 
	return $dataresult;
}

function backsports(){
	//$url = "http://www.huashengyoo.com/ssmp/searchapi.php?pagesize=".$pagesize."&pageno=".$pageno; 
    $url = 'data.xml';
	$doc = new DOMDocument(); 
	$doc->load($url); 
	$humans = $doc->getElementsByTagName("kindid")->item(0)->childNodes;
	$dataresult = array();
	foreach( $humans as $k=>$human ) 
	{ 
			$newarry = array();
			$id = $human->getElementsByTagName("id")->item(0)->nodeValue;
			$dest = $human->getElementsByTagName("dest")->item(0)->nodeValue;
			$newarry = array(
				'id' => $id,
				'dest' => $dest,
			);
			array_push($dataresult,$newarry);			
	} 
	return $dataresult;
}

function array_sort($array,$keys,$type='asc'){
	if(!isset($array) || !is_array($array) || empty($array)){
		return '';
	}
	if(!isset($keys) || trim($keys)==''){
		return '';
	}
	if(!isset($type) || $type=='' || !in_array(strtolower($type),array('asc','desc'))){
		return '';
	}
	$keysvalue=array();
	foreach($array as $key=>$val){
		$val[$keys] = str_replace('-','',$val[$keys]);
		$val[$keys] = str_replace(' ','',$val[$keys]);
		$val[$keys] = str_replace(':','',$val[$keys]);
		$keysvalue[] =$val[$keys];
	}
	asort($keysvalue); //key值排序
	reset($keysvalue); //指针重新指向数组第一个
	foreach($keysvalue as $key=>$vals) {
		$keysort[] = $key;
	}
	$keysvalue = array();
	$count=count($keysort);
	if(strtolower($type) != 'asc'){
		for($i=$count-1; $i>=0; $i--) {
			$keysvalue[] = $array[$keysort[$i]];
		}
	}else{
		for($i=0; $i<$count; $i++){
			$keysvalue[] = $array[$keysort[$i]];
		}
	}
	return $keysvalue;
}



//var_dump(GetMonth(4,4));
function GetMonth($sign="4",$p='0')
{
	for($i=0; $i<$sign; $i++){
		$s = $i + $p;
		$tmp_date=date("Ym");
		$tmp_year=substr($tmp_date,0,4);
		$tmp_mon =substr($tmp_date,4,2);
		$tmp_nextmonth = mktime(0,0,0,$tmp_mon+$s,1,$tmp_year);	
		$fm_next_month = date("Y-m",$tmp_nextmonth);
		$firstdate = date('Y-m-01', strtotime($fm_next_month));
		$enddate = date('Y-m-d', strtotime("$firstdate +1 month -1 day"));
		$datearray[] = array(
			'month' => $fm_next_month,
			'firstdate' => date('m月d日', strtotime($firstdate)),
			'enddate' => date('m月d日', strtotime($enddate)),
			'count' => backdate($fm_next_month,2),
		);

	}
	return 	$datearray;
}

//print_r(backdate('2016-10',2));
function backdate($month,$type){
	$tmp_month = empty($month) ? date("Y-m") : $month;
	$type = empty($type) ? 1 : $type;
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
	foreach( $dataresult as $k=>$v ) 
	{
		$curmonth = substr($v['getway'],0,7);

		if($curmonth <> $tmp_month){
		   unset($dataresult[$k]);
		}
	}
	if($type == 1){
		return $dataresult;
	}else{
		return count($dataresult);
	}

}

function deltrim($str){
	$str = trim($str); 
	$str = strip_tags($str,""); 
	$str = ereg_replace("\t","",$str); 
	$str = ereg_replace("\r\n","",$str); 
	$str = ereg_replace("\r","",$str); 
	$str = ereg_replace("\n","",$str); 
	$str = ereg_replace(" "," ",$str); 
	return trim($str); 
}
?> 