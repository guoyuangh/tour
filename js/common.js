// JavaScript Document
$(function(){
	//返回顶部 动画
	var $div = $("<div class=\"gotop\" style=\"display:none; padding:5px 10px; background:#ffd600; text-align:center; cursor:pointer;\"><a href=\"javascript:void(0)\" style=\"color:#333;\"><span class=\"glyphicon glyphicon-arrow-up\"></span><br />TOP</a></div>");
	$("body").append($div);	
	var page_width = $(".container").width()+50;	
	var gotop_left = ($(window).width()-page_width)/2+page_width;
	$(".gotop").css({'position':'fixed','bottom':'150px','left':gotop_left});
	$(window).scroll(function(){
		if($(this).scrollTop() > 200){	
			$(".gotop").fadeIn(300);
		}else{
			$(".gotop").fadeOut(300);
		}
	});
	$(".gotop").click(function(){
		$('body,html').animate({scrollTop:0},500);
		return false;
	});
	$('[data-toggle="tooltip"]').tooltip();
	
	$(".nav_menu>li").click(function(){
		$(this).siblings("li").removeClass("active");
		$(this).addClass("active");
	})
})

function divshow(sec,div){
	var $sec = $(sec);
	var $div = $(div);
	$sec.children("div").hide();
	$sec.find($div).show();
}