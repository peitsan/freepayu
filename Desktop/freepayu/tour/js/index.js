$(document).ready(function(){
	//鼠标滚轮事件
	function wheel(event){
		var delta = 0;
		if (!event) event = window.event;
		if (event.wheelDelta) {
			delta = event.wheelDelta/120; 
			if (window.opera) delta = -delta;
		} else if (event.detail) {
			delta = -event.detail/3;
		}
		if (delta && !isMobile){
			mouseWheel(delta);
		}
	}
	 
	if (window.addEventListener)
	window.addEventListener('DOMMouseScroll', wheel, false);
	window.onmousewheel = document.onmousewheel = wheel;
	
	//键盘按键事件
	$(document).keydown(
		function(e){keyDown(e);
	});
	
	$(".rollImg").bind("click", function(){
		downBtnDown();
	});
	
	//鼠标滚轮事件
	function mouseWheel(delta) {
		var dir = delta > 0 ? "up" : "down";
		var $actived = $(".active");
		var activeIndex = parseInt($actived.attr('index'));
		var numOfChildren = $(".page").length-1;
		
		if( dir == "down" && activeIndex<numOfChildren && canRoll) {
			jumpPage(false);
		} else if( dir =="up" && activeIndex>1 && canRoll) {
			jumpPage(true);
		} 
	}
	
	//键盘事件
	function keyDown(e) {
		var keycode = e.which || e.keyCode;
		var $actived = $(".active");
		var activeIndex = parseInt($actived.attr('index'));
		var numOfChildren = $(".page").length-1;

		if ((keycode == 65 || keycode == 38 || keycode ==87 || keycode ==33 ) && activeIndex>1 && canRoll){
			jumpPage(true);
			return false;
		} else if ((keycode == 40 || keycode == 83 || keycode ==68 || keycode ==34 && canRoll) && activeIndex<numOfChildren && canRoll){
			jumpPage(false);
			return false;
		} 
	}
	
	//屏幕上的向下按钮
	function downBtnDown(){
		var $actived = $(".active");
		var activeIndex = parseInt($actived.attr('index'));
		var numOfChildren = $(".page").length-1;
		if (activeIndex<numOfChildren && canRoll){
			jumpPage(false);
		}else{
			jumpPage(true);
		}
	}
			
	//显示上一个||下一个section
	function jumpPage(up) {
		var $actived = $(".active");
		var activeIndex = parseInt($actived.attr('index'));
		showPage(activeIndex + (up?-1:1));
	}				
});

	var curIndex = 1,canRoll = true;
	showPage(1);
	//页面切换功能
	function showPage(index){	
		if ( curIndex== index ) return; 
		if (canRoll == false) return;
		canRoll = false;	
		$("#s"+curIndex).removeClass("active").addClass("disappear");
		$("#pp"+curIndex).removeClass("pactive").addClass("pdisappear");
		$("#boxsider").removeClass("pagesider1 pagesider2 pagesider3 pagesider4 pagesider5");
		setTimeout((function(){
			$("#boxsider").addClass("pagesider"+index);
		}),400);
		$("#s"+index).removeClass("disappear").addClass("active");
		$("#pp"+index).removeClass("pdisappear").addClass("pactive");
		var t = -(index-1)*win_height;
		if(index==7){
			var hnum=jQuery("#s7").innerHeight();
			t=(-5*win_height)-hnum;
		}
		if(index==2){
			setTimeout(function(){
				jQuery("#s2 .linBox").addClass("hoves");
			},1400);
			
		}else{
			jQuery("#s2 .linBox").removeClass("hoves");
		}
		$(".content").animate({top:t},1000,"easeInOutCirc");
		
		eval("s"+index+"_run()");
		
		setTimeout(function(){
			canRoll = true;
		},1000);
		curIndex = index;
	}
	var s1_run = s2_run = s3_run = s4_run = s5_run = s6_run = s7_run = function(){};
	$(window).resize(function(){
		init();
	});
	
	var pageH = $(".pageH"),
 	ibox=$(".ibox"),
	$banner=jQuery("#banner"),
	$bannerPic=$banner.find(".bg"),
	$bannerImg=jQuery("#banner .bg .bimg");
	function init(){
		if(!isMobile){
			pageH.css({height:win_height}).removeClass("m-active");
			ibox.css({height:win_height});
			jQuery(".filler-left,.filler-right").css({height:win_height-40});
			jQuery(".filler-top,.filler-bottom").css({width:win_width-40});
			$banner.css({height:win_height});	
			$bannerPic.css({height:win_height});	
			setImgMax($bannerImg,1920,894,win_width,win_height);
		}else{
			pageH.css({height:""}).addClass("m-active");
			ibox.css({height:""});
			$banner.css({height:"auto"});
  			$bannerPic.css({height:"auto"});
  			$bannerImg.attr("style","").css({position: "relative"});
  			jQuery("#s3 .linBox").addClass("hoves");
		}
	}
	init();
	//头部动画效果
	$banner.slick({
	  autoplay: true,	
	  arrows: true,
	  dots:true,
	  infinite: true,
	  speed: 1000,
	  autoplaySpeed: 5000,
	  pauseOnHover: false,
	  fade: true,
	  cssEase: 'linear'
	});