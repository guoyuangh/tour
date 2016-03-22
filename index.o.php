<?php 
header("Content-type:text/html; Charset=utf-8");
error_reporting(0);
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
<title>华奥星空——花生游专题</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<div class="page_header">
  <div class="container center-block clearfix">
    <div class="page_logo fl"><img src="img/page_logo.png" /></div>
    <ul class="page_menu nav nav-pills fl">
      <li class="active"><a>首页</a></li>
      <li><a>赛事门票</a></li>
      <li><a>五大联赛</a></li>
      <li><a>赛事旅行</a></li>
      <li><a>体育资讯</a></li>
    </ul>
    <div class="page_search fr hidden-sm hidden-xs">
      <form class="form-inline">
        <div class="form-group">
          <div class="input-group">
            <input type="text" class="form-control" id="page_search" placeholder="搜赛事|门票|目的地">
            <a class="input-group-addon"><span class="fa fa-search"></span></a> </div>
        </div>
      </form>
    </div>
    <!--/.page_search--> 
  </div>
  <!--/.container--> 
</div>
<!--/.page_header-->
<div class="page_bodyer"> <!-- InstanceBeginEditable name="page_bodyer" -->
  <div id="home_carousel" class="carousel slide" data-ride="carousel"> 
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#home_carousel" data-slide-to="0" class="active"><img src="img/home_carousel_indicators_1.jpg" /></li>
      <li data-target="#home_carousel" data-slide-to="1"><img src="img/home_carousel_indicators_1.jpg" /></li>
      <li data-target="#home_carousel" data-slide-to="2"><img src="img/home_carousel_indicators_1.jpg" /></li>
      <li data-target="#home_carousel" data-slide-to="3"><img src="img/home_carousel_indicators_1.jpg" /></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active"> <img src="img/home_carousel_1.jpg" alt="">
        <div class="carousel-caption">
          <h3></h3>
          <p></p>
        </div>
      </div>
      <div class="item"> <img src="img/home_carousel_1.jpg" alt="">
        <div class="carousel-caption">
          <h3></h3>
          <p></p>
        </div>
      </div>
      <div class="item"> <img src="img/home_carousel_1.jpg" alt="">
        <div class="carousel-caption">
          <h3></h3>
          <p></p>
        </div>
      </div>
      <div class="item"> <img src="img/home_carousel_1.jpg" alt="">
        <div class="carousel-caption">
          <h3></h3>
          <p></p>
        </div>
      </div>
    </div>
    <!-- Controls --> 
    <a class="left carousel-control" href="#home_carousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#home_carousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
  <!--/#home_carousel-->
  <div class="container center-block">
    <div class="home_preferential">
      <div class="preferential_titlebar">
        <ul class="nav_menu nav nav-pills">
          <li class="active"><a onClick="divshow('#preferential_content','#preferential_ticket')">赛事门票</a></li>
          <li><a onClick="divshow('#preferential_content','#preferential_travel')">体育旅行</a></li>
        </ul>
        <img class="home_preferential_slogan" src="img/home_preferential_slogan.png" /> </div>
      <!--/.preferential_titlebar-->
      <div id="preferential_content">
        <div class="row" id="preferential_ticket">
<?php 
$curdata = backtour(5,1);
foreach($curdata as $k=>$v){
	$list = $v['list'];
	$new_list = array_sort($list,'price');
	if($k == 0){
?>
          <div class="col-md-6">
            <div class="game_item game_item_lg">
              <div class="game_img"><img src="<?php echo $v['litpic']?>" /></div>
              <a class="game_name"><?php echo $v['spotname']?></a>
              <div class="game_ticket">￥<?php echo $new_list[0]['price']?>起</div>
              <div class="game_location">地点：<?php echo $v['address'][2]?></div>
              <div class="game_date">时间：<?php echo $v['getway']?></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
<?php 
	}else{
?>
              <div class="col-xs-6">
                <div class="game_item">
                  <div class="game_img"><img src="<?php echo $v['litpic']?>"/></div>
                  <a class="game_name"><?php echo $v['spotname']?></a>
                  <div class="game_ticket">￥<?php echo $new_list[0]['price']?>起</div>
                  <div class="game_location"><?php echo $v['address'][1]?></div>
                  <div class="game_date"><?php echo $v['getway']?></div>
                </div>
              </div>
<?php 
    }
}
?> 
            </div>
            <!--/.col>row--> 
          </div>
        </div>
        <!--/.row-->
        <div class="row" id="preferential_travel" style="display:none;">
<?php 
$curdata = backtour(5,2);
foreach($curdata as $k=>$v){
	$list = $v['list'];
	$new_list = array_sort($list,'price');
	if($k == 0){
?>
          <div class="col-md-6">
            <div class="game_item game_item_lg">
              <div class="game_img"><img src="<?php echo $v['litpic']?>" /></div>
              <a class="game_name"><?php echo $v['spotname']?></a>
              <div class="game_ticket">￥<?php echo $new_list[0]['price']?>起</div>
              <div class="game_location">地点：<?php echo $v['address'][2]?></div>
              <div class="game_date">时间：<?php echo $v['getway']?></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
<?php 
	}else{
?>
              <div class="col-xs-6">
                <div class="game_item">
                  <div class="game_img"><img src="<?php echo $v['litpic']?>"/></div>
                  <a class="game_name"><?php echo $v['spotname']?></a>
                  <div class="game_ticket">￥<?php echo $new_list[0]['price']?>起</div>
                  <div class="game_location"><?php echo $v['address'][1]?></div>
                  <div class="game_date"><?php echo $v['getway']?></div>
                </div>
              </div>
<?php 
    }
}
?> 
            </div>
            <!--/.col>row--> 
          </div>
        </div>
        <!--/.row--> 
      </div>
      <!--/#preferential_content--> 
    </div>
    <!--/.home_preferential-->
    <div class="home_gamecalendar">
      <div class="gamecalendar_titlebar">
        <div class="section_titlebar">赛事一览</div>
        <div id="gamecalendar_date_week_carousel" class="carousel slide">
          <div class="carousel-inner gamecalendar_date_week" role="listbox">
            <div class="item active">
              <div class="text-center">
                <?php
				$pagedate = GetMonth();
				foreach( $pagedate as $k=>$v) 
				{ 
					echo '<a class="btn" rel="'.$v['month'].'"><span class="week_date">'.$v['firstdate'].'-'.$v['enddate'].'</span><br/><span class="week_games">共有'.$v['count'].'场比赛</span></a>';
				}
				?>
				</div>
            </div>
            <div class="item">
              <div class="text-center"> 
                <?php
				$pagedate = GetMonth(4,4);
				foreach( $pagedate as $k=>$v) 
				{ 
					echo '<a class="btn" rel="'.$v['month'].'"><span class="week_date">'.$v['firstdate'].'-'.$v['enddate'].'</span><br/><span class="week_games">共有'.$v['count'].'场比赛</span></a>';
				}
				?>			  
			  </div>
            </div>
          </div>
          <!--/.carousel-inner--> 
          <!-- Controls --> 
          <a class="left carousel-control" href="#gamecalendar_date_week_carousel" role="button" data-slide="prev"> <i class="fa fa-angle-left"></i> 上一页 </a> <a class="right carousel-control" href="#gamecalendar_date_week_carousel" role="button" data-slide="next"> 下一页 <i class="fa fa-angle-right"></i> </a> </div>
        <script>
          $('#gamecalendar_date_week_carousel').carousel({
			pause: true,
			interval: false
		  });
		  $(function(){
				$(".gamecalendar_date_week .item a.btn").click(function(){
					$(".gamecalendar_date_week .item a.btn").removeClass("btn_selected");
					var d = $(this).attr("rel");
					loaddiv(d);
					$(this).addClass("btn_selected"); 
				})
		  })
        </script> 
        <!--/#gamecalendar_date_week_carousel--> 
      </div>
      <!--/.gamecalendar_titlebar-->
<?php
//$datalist = backtour(200,1);
//var_dump($datalist);
?>

      <table class="table gamecalendar_table" id="tableload">
      </table>
    </div>
    <!--/.home_gamecalendar--> 
  </div>
  <!--/.container-->
  <div class="home_leagues">
    <div class="leagues_titlebar">
      <h3>热门赛事</h3>
    </div>
    <div class="container">
      <div class="row leagues_logos">
        <div class="col-sm-3"> <a class="thumbnail"> <img src="img/league_logo_premierleague.jpg" />
          <div class="caption text-center">
            <h4>英超联赛</h4>
          </div>
          </a> </div>
        <div class="col-sm-3"> <a class="thumbnail"> <img src="img/league_logo_LFP.jpg" />
          <div class="caption text-center">
            <h4>西甲联赛</h4>
          </div>
          </a> </div>
        <div class="col-sm-3"> <a class="thumbnail"> <img src="img/league_logo_bundesLIGA.jpg" />
          <div class="caption text-center">
            <h4>德甲联赛</h4>
          </div>
          </a> </div>
        <div class="col-sm-3"> <a class="thumbnail"> <img src="img/league_logo_serieA.jpg" />
          <div class="caption text-center">
            <h4>意甲联赛</h4>
          </div>
          </a> </div>
        <div class="col-sm-3"> <a class="thumbnail"> <img src="img/league_logo_LIGUE1.jpg" />
          <div class="caption text-center">
            <h4>法甲联赛</h4>
          </div>
          </a> </div>
        <div class="col-sm-3"> <a class="thumbnail"> <img src="img/league_logo_MLS.jpg" />
          <div class="caption text-center">
            <h4>美国大联盟</h4>
          </div>
          </a> </div>
        <div class="col-sm-3"> <a class="thumbnail"> <img src="img/league_logo_championsleague.jpg" />
          <div class="caption text-center">
            <h4>欧洲冠军联赛</h4>
          </div>
          </a> </div>
        <div class="col-sm-3"> <a class="thumbnail"> <img src="img/league_logo_europaleague.jpg" />
          <div class="caption text-center">
            <h4>欧洲联盟杯</h4>
          </div>
          </a> </div>
      </div>
    </div>
  </div>
  <!--/.home_leagues-->
  <div class="container">
    <div class="home_weekhot">
      <div class="section_titlebar">本周特惠</div>
      <div class="section_content row">
        <div class="col-xs-6 col-sm-3">
          <div class="game_item">
            <div class="game_img"><img src="img/20160128153459.jpg" /></div>
            <a class="game_name">【欧冠八分之一决赛】巴塞罗那vs阿森纳</a>
            <div class="game_ticket">￥1250起</div>
            <div class="game_location">巴塞罗那</div>
            <div class="game_date">2016年3月16日</div>
          </div>
          <!--/.game_item--> 
        </div>
        <!--/.col-->
        <div class="col-xs-6 col-sm-3">
          <div class="game_item">
            <div class="game_img"><img src="img/20160128153459.jpg" /></div>
            <a class="game_name">【欧冠八分之一决赛】巴塞罗那vs阿森纳</a>
            <div class="game_ticket">￥1250起</div>
            <div class="game_location">巴塞罗那</div>
            <div class="game_date">2016年3月16日</div>
          </div>
          <!--/.game_item--> 
        </div>
        <!--/.col-->
        <div class="col-xs-6 col-sm-3">
          <div class="game_item">
            <div class="game_img"><img src="img/20160128153459.jpg" /></div>
            <a class="game_name">【欧冠八分之一决赛】巴塞罗那vs阿森纳</a>
            <div class="game_ticket">￥1250起</div>
            <div class="game_location">巴塞罗那</div>
            <div class="game_date">2016年3月16日</div>
          </div>
          <!--/.game_item--> 
        </div>
        <!--/.col-->
        <div class="col-xs-6 col-sm-3">
          <div class="game_item">
            <div class="game_img"><img src="img/20160128153459.jpg" /></div>
            <a class="game_name">【欧冠八分之一决赛】巴塞罗那vs阿森纳</a>
            <div class="game_ticket">￥1250起</div>
            <div class="game_location">巴塞罗那</div>
            <div class="game_date">2016年3月16日</div>
          </div>
          <!--/.game_item--> 
        </div>
        <!--/.col--> 
      </div>
    </div>
    <!--/.home_weekhot-->
    <div class="home_community">
      <div class="row">
        <div class="col-md-8">
          <div class="community_news">
            <div class="section_titlebar">体育旅行社区</div>
            <div class="news_item row">
              <div class="col-sm-5"> <a class="thumbnail"><img src="img/20151013132549.jpg" /></a> </div>
              <div class="col-sm-7">
                <h4><a>干货分享——我的西甲观赛之旅</a></h4>
                <p>【来自花生游用户陈先生的西甲之旅】西班牙时间2015年9月12日20:30分，我在马德里卡尔德隆球场观看了2015-2016赛季西班牙足球甲级联赛马德里竞技队vs巴塞罗那队的比赛。作为一名中立球迷，原...</p>
                <div class="article_info"><span>作者：陈先生  |  2015-10-13</span></div>
              </div>
            </div>
            <!--/.news_item-->
            <div class="news_item row">
              <div class="col-sm-5"> <a class="thumbnail"><img src="img/20151013132549.jpg" /></a> </div>
              <div class="col-sm-7">
                <h4><a>干货分享——我的西甲观赛之旅</a></h4>
                <p>【来自花生游用户陈先生的西甲之旅】西班牙时间2015年9月12日20:30分，我在马德里卡尔德隆球场观看了2015-2016赛季西班牙足球甲级联赛马德里竞技队vs巴塞罗那队的比赛。作为一名中立球迷，原...</p>
                <div class="article_info"><span>作者：陈先生  |  2015-10-13</span></div>
              </div>
            </div>
            <!--/.news_item-->
            <div class="news_item row">
              <div class="col-sm-5"> <a class="thumbnail"><img src="img/20151013132549.jpg" /></a> </div>
              <div class="col-sm-7">
                <h4><a>干货分享——我的西甲观赛之旅</a></h4>
                <p>【来自花生游用户陈先生的西甲之旅】西班牙时间2015年9月12日20:30分，我在马德里卡尔德隆球场观看了2015-2016赛季西班牙足球甲级联赛马德里竞技队vs巴塞罗那队的比赛。作为一名中立球迷，原...</p>
                <div class="article_info"><span>作者：陈先生  |  2015-10-13</span></div>
              </div>
            </div>
            <!--/.news_item-->
            <div class="news_item row">
              <div class="col-sm-5"> <a class="thumbnail"><img src="img/20151013132549.jpg" /></a> </div>
              <div class="col-sm-7">
                <h4><a>干货分享——我的西甲观赛之旅</a></h4>
                <p>【来自花生游用户陈先生的西甲之旅】西班牙时间2015年9月12日20:30分，我在马德里卡尔德隆球场观看了2015-2016赛季西班牙足球甲级联赛马德里竞技队vs巴塞罗那队的比赛。作为一名中立球迷，原...</p>
                <div class="article_info"><span>作者：陈先生  |  2015-10-13</span></div>
              </div>
            </div>
            <!--/.news_item--> 
          </div>
          <!--/.community_news--> 
        </div>
        <!--/.col-->
        <div class="col-md-4">
          <div class="home_countdown">
            <div class="section_titlebar">2016里约奥运会开幕 倒计时</div>
            <div id="defaultCountdown"></div>
          </div>
          <!--/.home_countdown-->
          <div class="home_weibo">
            <div class="section_titlebar">官方微博</div>
            <div class="huashengyoo_weibo">
              <div class="weibo_main clearfix"> <img class="weibo_logo" src="img/huashengyoo_weibo_logo.jpg" />
                <h4>花生游体育旅行网</h4>
                <p>竞佳境体育文化传媒（北京）有限公司</p>
                <a class="btn btn-primary"><i class="fa fa-plus"></i> 关注</a> </div>
              <div class="weibo_content"> </div>
            </div>
            <!--/.huashengyoo_weibo--> 
          </div>
          <!--/.home_weibo--> 
        </div>
        <!--/.col--> 
      </div>
      <!--/.row--> 
    </div>
    <!--/.home_community--> 
  </div>
  <!--/.container--> 
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
<script src="js/common.js"></script> 
<script src="js/countdown/jquery.countdown.js"></script> 
<script type="text/javascript">
$(function () {
	var target = new Date("2016/8/5 19:00:00");
	var today = new Date();
	var time = target.getTime() - today.getTime();
	var seconds = Math.floor(time / (1000));
	$('#defaultCountdown').countdown({
		until: seconds,
		format: 'DHMS',
		layout: '<div id="timer">'+
				//'<div class="title">距离活动开幕还有</div>'+
				'<div id="vals" class="clearfix">'+
				//'<div id="y" class="numbs">{ynn}</div>'+
				'<div id="d" class="numbs">{dnnn}<span class="labs">天</span></div>'+
				'<div id="h" class="numbs">{hnn}<span class="labs">时</span></div>'+
				'<div id="m" class="numbs">{mnn}<span class="labs">分</span></div>'+
				'<div id="s" class="numbs">{snn}<span class="labs">秒</span></div>'+
				'</div>'+
				'</div>'
	});
});
</script>
<script type="text/javascript">

$(document).ready(function(){ 
    loaddiv(); 
}); 

function loaddiv(d){
	var ajaxurl = "js.php";
	var query = new Object();
	query.d = d;
	$.ajax({
	   type: "POST",
	   url: ajaxurl,
	   data: query,
	   success: function(msg){
			json = eval(msg)  
		    var j = 1;
			var list = "";
			var list1 = "";
			var list2 = "";
			var list3 = "";
			var list4 = "";
			for(var i=0; i<json.length; i++)  
			{  
			    //alert(json[i].aid+" " + json[i].spotname) 
				if(j <= 7){
				    list1 += '<td><div class="game_img"><img src="'+json[i].litpic+'" /></div><a class="game_name" href="detail.php?aid='+json[i].aid+'">'+json[i].spotname+'</a></td>';
				};
				if(j > 7 && j<=14){
				    list2 += '<td><div class="game_img"><img src="'+json[i].litpic+'" /></div><a class="game_name" href="detail.php?aid='+json[i].aid+'">'+json[i].spotname+'</a></td>';
				};
				if(j > 14 && j<=21){
				    list3 += '<td><a class="game_name" href="detail.php?aid='+json[i].aid+'">'+json[i].spotname+'</a></td>';
				};
				if(j > 21 && j<=28){
				    list4 += '<td><a class="game_name" href="detail.php?aid='+json[i].aid+'">'+json[i].spotname+'</a></td>';
				};

			    j++;
			};
			list1 = '<tr>' + list1 + '</tr>';
			list2 = '<tr>' + list2 + '</tr>';
			list3 = '<tr>' + list3 + '</tr>';
			list4 = '<tr>' + list4 + '</tr>';
			list = list1 + list2 + list3 + list4;
			$("#tableload").html(list);
	   },
	   error:function(ajaxobj)
		{
		  $("#tableload").html("数据加载失败！")
		}			   
	});
}
</script>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd -->
</html>
<?php 
function backtour($pagesize,$pageno ){
	//$pagesize = 4;
	//$pageno = 1;
	$pagesize = empty($pagesize) ? 1 : $pagesize;
	$pageno = empty($pageno) ? 1 : $pageno;
	$url = "http://www.huashengyoo.com/ssmp/searchapi.php?pagesize=".$pagesize."&pageno=".$pageno; 

	$doc = new DOMDocument(); 
	$doc->load($url); 
	$humans = $doc->getElementsByTagName("listview")->item(0)->childNodes;
	$totalpage = $doc->getElementsByTagName("totalpage")->item(0)->nodeValue;
	$totalresult = $doc->getElementsByTagName("totalresult")->item(0)->nodeValue;

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
?> 