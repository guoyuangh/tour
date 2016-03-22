<?php 
header("Content-type:text/html; Charset=utf-8");
error_reporting(0);
include 'function.php';
$doc = new DOMDocument(); 
$doc->load('data.xml'); 
$humans = $doc->getElementsByTagName("listview")->item(0)->childNodes;
$daid = $_GET['aid'];
if(empty($daid)){
    echo "加载失败";
	exit();
}
$detail = back_content($daid);
//print_r($detail);
function back_content($daid){
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
		$sellpoint = $human->getElementsByTagName("sellpoint")->item(0)->nodeValue;
		$address = $human->getElementsByTagName("address")->item(0)->nodeValue;
		//$address = explode('|',$add);
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
			'ticketdescription' => str_replace(']]>','',$ticketdescription),
			'fieldintroduction' => str_replace(']]>','',$fieldintroduction),
			'howtoarrive' => str_replace(']]>','',$howtoarrive),
			'arenaseats' => str_replace(']]>','',$arenaseats),
			'howtopay' => str_replace(']]>','',$howtopay),
			'ticketmethod' => str_replace(']]>','',$ticketmethod),
			'list' => $newlistall,
		);
		array_push($dataresult,$newarry);
	} 
	foreach( $dataresult as $k=>$v ) 
	{
		if($daid == $v['aid']){
			$kval = $k;
		}else{
		    unset($dataresult[$k]);
		}
	}
	return $dataresult[$kval];
}
?> 
<!DOCTYPE HTML>
<html lang="zh-CN">
<!-- InstanceBegin template="/Templates/main.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" type="text/css" href="js/bootstrap-3.3.5-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="js/font-awesome-4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?php echo $detail['spotname']?>-华奥星空-花生游专题</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<div class="page_header">
  <div class="container center-block clearfix">
    <div class="page_logo fl"><img src="img/page_logo.png" /></div>
    <!-- InstanceBeginEditable name="page_menu" -->
    <ul class="page_menu nav nav-pills fl">
      <li><a href="/">首页</a></li>
      <li class="active"><a href="list.php" target="_blank">赛事门票</a></li>
      <li><a>五大联赛</a></li>
      <li><a>赛事旅行</a></li>
      <li><a>体育资讯</a></li>
    </ul>
    <!-- InstanceEndEditable -->
    <!--/.page_search--> 
  </div>
  <!--/.container--> 
</div>
<!--/.page_header-->
<div class="page_bodyer"><!-- InstanceBeginEditable name="page_bodyer" -->
  <div style="height:50px;"></div>
  <div class="container">
    <div class="ticket_detail clearfix">
      <div class="col-xs-12">
        <div class="tit clearfix">
          <div class="ht">
            <h3><?php echo $detail['spotname']?></h3>
          </div>
          <div class="mt"><a><img src="img/20150402143128.png"/></a></div>
          <div class="ot"><a data-toggle="tooltip" data-placement="bottom" title="此类订单需要花生游工作人员核对产品信息之后（下单后24小时内完成），才能与您确认成交。该预订方式虽会延缓订单的确认时间，但能够帮助海外的工作人员第一时间收到预订信息并为您安排，保证您的旅行顺利。"><i class="fa fa-question-circle"></i> 什么是二次确认？</a> <a data-toggle="tooltip" data-placement="bottom" title="本起价是从所有可选产品日期中选出的最低单人价格，实际产品价格会根据您所选择的出发日期、出行人数、服务标准以及所选附加服务的不同而有所差别。最终价格以您提交订单，公司确认为准。"><i class="fa fa-info-circle"></i> 起价说明</a></div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="thumbnail"><img src="img/20150702163914.png" /></div>
      </div>
      <div class="col-md-7">
        <p><span class="text-warning">比赛日期：</span><?php echo substr($detail['getway'],0,10)?><span class="text-danger"> (*当地时间)</span></p>
        <p><span class="text-warning">比赛时间：</span><?php echo substr($detail['getway'],11,16)?><span class="text-danger"> (*当地时间)</span></p>
        <p><span class="text-warning">比赛地点：</span><?php echo $detail['address']?></p>
        <hr/>
        <h5>门票说明：</h5>
        <p><?php echo $detail['sellpoint']?></p>
      </div>
    </div>
    <!--/.ticket_detail-->
    <div class="row">
      <div class="col-md-8">
        <div class="sidle_section">
          <div class="tit">门票预订</div>
          <div class="ctt">
            <table class="ticket_salestable table table-hover">
              <tr>
                <th>门票说明</th>
                <th>门票价格</th>
                <th>剩余数量</th>
                <th>我要预订</th>
              </tr>
<?php
	foreach( $detail['list'] as $k=>$v ) 
	{ 
	echo '<tr><td>'.$v['title'].'</td><td><span class="ticket_color">￥'.$v['price'].'</span></td><td>剩余 <span class="ticket_color">'.$v['number'].'</span> 张</td><td><a class="btn btn-sm btn-primary" target="_blank" href="http://www.huashengyoo.com/spots/booking.php?spotid='.$v['id'].'&ticketid='.$v['aid'].'">预订</a></td></tr>';
	}
?>
            </table>
          </div>
        </div>
        <!--/.sidle_section-->
        <div class="ticket_explain">
          <div class="tit navbar-wrapper">
            <ul class="nav nav-pills">
              <li class="menuitem active"><a href="#p0">门票说明</a></li>
              <li class="menuitem"><a href="#p1">赛场介绍</a></li>
              <li class="menuitem"><a href="#p2">如何到达</a></li>
              <li class="menuitem"><a href="#p3">赛场座位</a></li>
              <li class="menuitem"><a href="#p4">如何支付</a></li>
              <li class="menuitem"><a href="#p5">取票方式</a></li>
            </ul>
          </div>
          <div class="ctt">
            <div id="p0">
              <h4><i class="fa fa-flag"></i> 门票说明</h4>
<?php echo $detail['ticketdescription']?>
            </div>
            <div id="p1">
              <h4><i class="fa fa-flag"></i> 赛场介绍</h4>
<?php echo $detail['fieldintroduction']?>
            </div>
            <div id="p2">
              <h4><i class="fa fa-flag"></i> 如何到达</h4>
<?php echo $detail['howtoarrive']?>
            </div>
            <div id="p3">
              <h4><i class="fa fa-flag"></i> 赛场座位</h4>
<?php echo $detail['arenaseats']?>
            </div>
            <div id="p4">
              <h4><i class="fa fa-flag"></i> 如何支付</h4>
<?php echo $detail['howtopay']?>
            </div>
            <div id="p5">
              <h4><i class="fa fa-flag"></i> 取票方式</h4>
<?php echo str_replace('div','p',$detail['ticketmethod'])?>
            </div>
          </div>
        </div>
        <!--/.ticket_explain--> 
      </div>
      <div class="col-md-4">
        <div class="sidle_section">
          <div class="tit">热门赛事门票推荐</div>
          <div class="ctt">

<?php 
$curdata = backtour(5,1);
foreach($curdata as $k=>$v){
	$list = $v['list'];
	$new_list = array_sort($list,'price');
?>
            <div class="game_item game_item_withoutimg">
              <a class="game_name" target="_blank" href="detail.php?aid=<?php echo $new_list[0]['id']?>"><?php echo $v['spotname']?></a>
              <div class="game_date"><span class="text-warning">日期：</span><?php echo $v['getway']?></div>
              <div class="game_location"><span class="text-warning">地点：</span><?php echo $v['address'][0];echo $v['address'][1];echo $v['address'][2];?></div>
              <div class="game_ticket">￥<?php echo $new_list[0]['price']?>起</div>
            </div>
<?php 
}
?> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- InstanceEndEditable --> </div>
<!--/.page_bodyer-->
<div class="page_footer">
  <div class="footer_link">
    <div class="container center-block text-center clearfix"> <span class="copyright">©2003-2015北京华奥星空科技发展有限责任公司版权所有</span> | <a>关于华奥星空</a> | <a>隐私保护</a> | <a>网建服务</a> | <a>广告服务</a> | <a>招聘信息</a> | <a>联系我们</a> </div>
  </div>
  <div class="footer_info">
    <div class="container center-block text-center clearfix">
      <ul>
        <li>网上传播视听节目许可证：</li>
        <li>发证机关：国家广播电影电视总局</li>
        <li>&nbsp;</li>
        <li>ICP经营许可证：</li>
        <li>京公网安备 号</li>
        <li>&nbsp;</li>
        <li>客服保障电话：400</li>
        <li>客服保障邮箱：</li>
      </ul>
    </div>
  </div>
</div>
<!--/.page_footer--> 
<!-- InstanceBeginEditable name="page_script" --> 
<script src="js/stickUp.min.js"></script> 
<script src="js/common.js"></script> 
<script>
jQuery(function($){
	$(document).ready(function(){
		$('.navbar-wrapper').stickUp({
			parts: { 0:'p0', 1:'p1', 2: 'p2', 3: 'p3', 4: 'p4', 5: 'p5', 6: 'p6', 7: 'p7' }, itemClass: 'menuitem', itemHover: 'active'
		});
	});
});
</script> 
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd -->
</html>
