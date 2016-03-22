<?php 
header("Content-type:text/html; Charset=utf-8");
error_reporting(0);
include 'function.php';
$dest = !empty($_REQUEST['dest']) ? $_REQUEST['dest'] : '0';
$kindid = !empty($_REQUEST['kindid']) ? $_REQUEST['kindid'] : '0';
$attrid = !empty($_REQUEST['attrid']) ? $_REQUEST['attrid'] : '0';
$page = !empty($_REQUEST['p']) ? $_REQUEST['p'] : 1;
$curdata = backlist($page,$attrid,$kindid,$dest);
//print_r($curdata);
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
<title>赛事门票-华奥星空-花生游专题</title>
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
    <div class="row">
      <div class="col-sm-4">
        <div class="sidle_search">
          <div class="tit"><img src="img/ticket_ser_bt.png" /></div>
          <div class="ctt">
            <p>输入要去的目的地或您感兴趣的赛事、球队或运动名称，看看有哪些惊喜等着您！</p>
            <form class="form-horizontal" action="search.php" method="get" id="subform" name="subform">
              <div class="form-group">
                <label for="" class="col-sm-4 control-label">赛事名称</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" value="" name="keyword" id="keyword">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-4 control-label">目的地</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" value="" name="dest" id="dest">
                </div>
              </div>
              <a class="btn btn-block btn-primary" onclick="document.getElementById('subform').onsubmit" href="javascript:subform.submit();">搜索</a>
            </form>
          </div>
          <!--/.ctt--> 
        </div>
        <!--/.sidle_search-->
        <div class="sidle_section">
          <div class="tit">相关赛事旅行产品</div>
          <div class="ctt">
            <div class="game_item">
              <div class="game_img"><img src="img/20160128153459.jpg" /></div>
              <a class="game_name">【欧冠八分之一决赛】巴塞罗那vs阿森纳</a>
              <div class="game_ticket">￥1250起</div>
              <div class="game_location">巴塞罗那</div>
              <div class="game_date">2016年3月16日</div>
            </div>
            <div class="game_item">
              <div class="game_img"><img src="img/20160128153459.jpg" /></div>
              <a class="game_name">【欧冠八分之一决赛】巴塞罗那vs阿森纳</a>
              <div class="game_ticket">￥1250起</div>
              <div class="game_location">巴塞罗那</div>
              <div class="game_date">2016年3月16日</div>
            </div>
            <div class="game_item">
              <div class="game_img"><img src="img/20160128153459.jpg" /></div>
              <a class="game_name">【欧冠八分之一决赛】巴塞罗那vs阿森纳</a>
              <div class="game_ticket">￥1250起</div>
              <div class="game_location">巴塞罗那</div>
              <div class="game_date">2016年3月16日</div>
            </div>
            <div class="game_item">
              <div class="game_img"><img src="img/20160128153459.jpg" /></div>
              <a class="game_name">【欧冠八分之一决赛】巴塞罗那vs阿森纳</a>
              <div class="game_ticket">￥1250起</div>
              <div class="game_location">巴塞罗那</div>
              <div class="game_date">2016年3月16日</div>
            </div>
            <div class="game_item">
              <div class="game_img"><img src="img/20160128153459.jpg" /></div>
              <a class="game_name">【欧冠八分之一决赛】巴塞罗那vs阿森纳</a>
              <div class="game_ticket">￥1250起</div>
              <div class="game_location">巴塞罗那</div>
              <div class="game_date">2016年3月16日</div>
            </div>
          </div>
        </div>
        <!--/.sidle_section--> 
      </div>
      <div class="col-sm-8">
        <div class="search_filter">
          <form class="form-horizontal">
            <div class="form-group">
              <label for="" class="col-sm-3 col-md-2 control-label">目的地</label>
              <div class="col-sm-9 col-md-10">
                <ul class="nav nav-pills">
<?php 
$typedata = backtype();
foreach($typedata as $k=>$v){
?>
<li <?php if($dest == $v['id']){echo 'class="active"';}?>><a href='javascript:void(0)' onclick='gototype("<?php echo $v['id']?>","<?php echo $kindid?>")'><?php echo $v['dest']?></a></li>
<?php 
}
?> 
                </ul>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-3 col-md-2 control-label">热门运动</label>
              <div class="col-sm-9 col-md-10">
                <ul class="nav nav-pills">
<?php 
$typedata = backsports();
foreach($typedata as $k=>$v){
?>
<li <?php if($kindid == $v['id']){echo 'class="active"';}?>><a href='javascript:void(0)' onclick='gotokindid("<?php echo $v['id']?>","<?php echo $dest?>")'><?php echo $v['dest']?></a></li>
<?php 
}
?>
                </ul>
              </div>
            </div>
          </form>
        </div>
        <!--/.search_filter-->
        <div class="search_result">
          <div class="tit"><img src="img/ticket_list_bt.png" /></div>
          <div class="ctt">
<?php 
foreach($curdata as $k=>$v){
	$list = $v['list'];
	$new_list = array_sort($list,'price');
?>
            <div class="news_item row">
              <div class="col-sm-5"> <a href="detail.php?aid=<?php echo $new_list[0]['id']?>" class="thumbnail" target="_blank" href="detail.html"><img src="<?php echo $v['litpic']?>" /></a> </div>
              <div class="col-sm-7">
                <h4><a target="_blank" href="detail.php?aid=<?php echo $new_list[0]['id']?>"><?php echo $v['spotname']?></a></h4>
                <p><span class="text-warning">日期：</span><?php echo $v['getway']?><span class="text-danger"> (*当地时间)</span></p>
                <p><span class="text-warning">地点：</span><?php echo $v['address'][0];echo $v['address'][1];echo $v['address'][2];?></p>
                <h5>门票说明：</h5>
                <?php echo $v['sellpoint']?>
              </div>
              <div class="col-sm-12">
                <table class="ticket_salestable table table-hover">
<?php
	foreach( $v['list'] as $k=>$v ) 
	{ 
	echo '<tr><td>'.$v['title'].'</td><td><span class="ticket_color">￥'.$v['price'].'</span></td><td>剩余 <span class="ticket_color">'.$v['number'].'</span> 张</td><td><a class="btn btn-sm btn-primary" target="_blank" href="http://www.huashengyoo.com/spots/booking.php?spotid='.$v['id'].'&ticketid='.$v['aid'].'">预订</a></td></tr>';
	}
?>
                </table>
              </div>
            </div>
<?php 
}
?> 
            <div class="text-center "><div id="setpage"></div></div> 
          </div>
          <!--/.search_result .ctt--> 
        </div>
        <!--/.search_result--> 
      </div>
    </div>
  </div>
  <!--.container--> 
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
<!-- InstanceEndEditable -->

<script type="text/javascript"> 
<!-- 
var totalpage,pagesize,cpage,count,curcount,outstr; 
//初始化 
cpage = <?php echo $page?>; 
totalpage = '<?php echo $curdata[0]['totalpage']?>'; 
pagesize = '<?php echo $curdata[0]['pagesize']?>'; 
outstr = ""; 
function gotopage(target) 
{     
    cpage = target;        //把页面计数定位到第几页 
    setpage(); 
    window.location.href = 'list.php?p=' + target + '&kindid=<?php echo $kindid?>&dest=<?php echo $dest?>'; 
} 
function setpage() 
{ 
    if(totalpage<=5){        //总页数小于十页 
        for (count=1;count<=totalpage;count++) 
        {    if(count!=cpage) 
            { 
                outstr = outstr + "<li><a href='javascript:void(0)' onclick='gotopage("+count+")'>"+count+"</a></li>"; 
            }else{ 
                outstr = outstr + "<li class='active' ><a>"+count+"</a></li>"; 
            } 
        } 
    } 
    if(totalpage>10){        //总页数大于十页 
        if(parseInt((cpage-1)/5) == 0) 
        {             
            for (count=1;count<=5;count++) 
            {    if(count!=cpage) 
                { 
                    outstr = outstr + "<li><a href='javascript:void(0)' onclick='gotopage("+count+")'>"+count+"</a></li>"; 
                }else{ 
                    outstr = outstr + "<li class='active'><a>"+count+"</a></li>"; 
                } 
            } 
            outstr = outstr + "<li><a href='javascript:void(0)' onclick='gotopage("+count+")'> >> </a></li>"; 
        } 
        else if(parseInt((cpage-1)/5) == parseInt(totalpage/5)) 
        {     
            outstr = outstr + "<li><a href='javascript:void(0)' onclick='gotopage("+(parseInt((cpage-1)/5)*5)+")'><<</a></li>"; 
            for (count=parseInt(totalpage/5)*5+1;count<=totalpage;count++) 
            {    if(count!=cpage) 
                { 
                    outstr = outstr + "<li><a href='javascript:void(0)' onclick='gotopage("+count+")'>"+count+"</a></li>"; 
                }else{ 
                    outstr = outstr + "<li class='active'><a>"+count+"</a></li>"; 
                } 
            } 
        } 
        else 
        {     
            outstr = outstr + "<li><a href='javascript:void(0)' onclick='gotopage("+(parseInt((cpage-1)/5)*5)+")'><<</a></li>"; 
            for (count=parseInt((cpage-1)/5)*5+1;count<=parseInt((cpage-1)/5)*5+5;count++) 
            {         
                if(count!=cpage) 
                { 
                    outstr = outstr + "<li><a href='javascript:void(0)' onclick='gotopage("+count+")'>"+count+"</a></li>"; 
                }else{ 
                    outstr = outstr + "<li class='active'><a>"+count+"</a></li>"; 
                } 
            } 
            outstr = outstr + "<li><a href='javascript:void(0)' onclick='gotopage("+count+")'> >> </a></li>"; 
        } 
    }     
    document.getElementById("setpage").innerHTML = "<ul id='setpage' class='pagination'>" + outstr + "<\/ul>"; 
    outstr = ""; 
} 
setpage();    //调用分页 
//--> 
</script> 

<script type="text/javascript"> 
function gototype(arg,arg1){
    window.location.href = 'list.php?dest=' + arg + '&kindid=' + arg1;
}
</script>
<script type="text/javascript">
function gotokindid(arg,arg1){
    window.location.href = 'list.php?kindid=' + arg+ '&dest=' + arg1;
}
</script> 
</body>
<!-- InstanceEnd -->
</html>
