(function( $ ){
$(function(){
	itrMotion();
	
	var typingBool = false; 
	var typingIdx=0; 
	var typingTxt = $(".typing-txt").text(); // 타이핑될 텍스트를 가져온다 
		typingTxt=typingTxt.split(""); // 한글자씩 자른다. 
		if(typingBool==false){ // 타이핑이 진행되지 않았다면 
		   typingBool=true; 

		   var tyInt = setInterval(typing,100); // 반복동작 
		 } 

	 function typing(){ 
	   if(typingIdx<typingTxt.length){ // 타이핑될 텍스트 길이만큼 반복 
		 $(".typing").append(typingTxt[typingIdx]); // 한글자씩 이어준다. 
		 typingIdx++; 
	   } else{ 
		 clearInterval(tyInt); //끝나면 반복종료 
	   } 
	 } 
	
	/* colorchart 배경색*/
	$(".color_list > li").each(function(i){
		var colr = $(this).find('a').html();
		$(this).find('a').attr('style', 'background-color:' + colr);
	});
	
	/* color click 시 색 변경*/
	  $('.color_list li a').click(function(){
		$('.color_list li a').removeClass('chk');
		$(this).addClass('chk');

	}); 
	
	
	/* colorchart 위치 */
	$('.color_btn').click(function(){
		$('.color_list li a').removeClass('chk');
		$('.cp_btn').empty();
		
		var pos = parseFloat($(this).offset().top);
		$('#color_palette').css('top', pos-20);


		if($(this).hasClass('color_btn01')){
		   $(this).clone().prependTo($('.cp_btn'));
		 }
		else{
			$('.colb_box').clone().prependTo($('.cp_btn'));
		}

		
		$('#color_palette .color_btn').attr('onclick','pal_off()')
	});
	
	
	
	/* 배경 이미지 */
	$('.name_list li').click(function(){
		if($(this).hasClass('on')){
				$(this).removeClass('on');
		   }
		   else{
			   $('.name_list li').removeClass('on');
				$(this).addClass('on');
				
		   }	
	});
 
	
	/* top 버튼 */
	 $(".top").click(function() {
		$('html, body').animate({
			scrollTop : 0
		}, 400);
		return false;
	});

	/* preview */
	$('.pre_btn').click(function(){
		$('.preview .preview_area').toggle();
	});
	
	
	
});



/* motion */
function itrMotion(){
    var screenTl = new TimelineMax();
    screenTl
    .to($('#wrapper'), 0.1, {opacity:1, ease:Sine.easeInOut}, "+=0.2")
    .fromTo($('.screen'), 1.8, {scale:1, y:0}, {scale:20, y:-900, ease:Circ.easeInOut}, "-=1.1")
    .to($('.screen'), 0.6, {opacity:0.8, ease:Circ.easeInOut}, "-=1.3")
    .to($('.screen'), 0.6, {opacity:0, ease:Circ.easeInOut}, "-=0.1")
    .fromTo($('.screen'), 0.1, {x:0},{x:-200000}, "-=0")
    .to($('#header h1, .util, .quick'), 0.6, {opacity:1}, "-=0.6");


    var eas = Expo.easeOut;
    var hx1Tl = new TimelineMax();
    hx1Tl
        .to($('.hexa1'), 0.3, {opacity:1}, "+=0.35")
        .from($('.hexa1'), 0.5, {rotationY:510, ease:Linear.easeNone}, "-=0.3")
        .from($('.hexa1'), 1, {scale:0, ease:Elastic.easeOut.config(10.5, 0.6)}, "-=0.5")
        .from($('.hexa1'), 1.4, {x:800, y:220, ease:eas}, "-=1");

    var hx2Tl = new TimelineMax();
    hx2Tl
        .to($('.hexa2'), 0.4, {opacity:1}, "+=0.53")
        .from($('.hexa2'), 0.52, {rotation:90, ease:Linear.easeNone}, "-=0.4")
        .from($('.hexa2'), 0.8, {scale:5,  ease:Elastic.easeOut.config(5, 0.5)}, "-=0.52")
        .from($('.hexa2'), 1.9, {x:-800, y:100, ease:eas}, "-=0.8");

    var hx3Tl = new TimelineMax();
    hx3Tl
        .to($('.hexa3'), 0.4, {opacity:1}, "+=0.58")
        .from($('.hexa3'), 0.6, {rotationY:90, ease:Linear.easeNone}, "-=0.4")
        .from($('.hexa3'), 0.8, {scale:5,  ease:Elastic.easeOut.config(5, 0.6)}, "-=0.6")
        .from($('.hexa3'), 1.6, {x:450, y:-100, ease:eas}, "-=0.8");

    var hx4Tl = new TimelineMax();
    hx4Tl
        .to($('.hexa4'), 0.4, {opacity:1}, "+=0.7")
        .from($('.hexa4'), 0.6, {rotationY:-290, ease:Linear.easeNone}, "-=0.4")
        .from($('.hexa4'), 1, {scale:0,  ease:Elastic.easeOut.config(5, 0.6)}, "-=0.6")
        .from($('.hexa4'), 1.7, {x:-1000, y:120, ease:eas}, "-=1");

    var hx5Tl = new TimelineMax();
    hx5Tl
        .to($('.hexa5'), 0.4, {opacity:1}, "+=0.66")
        .from($('.hexa5'), 0.45, {rotationY:200, ease:Linear.easeNone}, "-=0.4")
        .from($('.hexa5'), 0.8, {scale:0,  ease:Elastic.easeOut.config(5, 0.6)}, "-=0.45")
        .from($('.hexa5'), 1.6, {x:-1000, y:-220, ease:eas}, "-=0.8");

    var hx6Tl = new TimelineMax();
    hx6Tl
        .to($('.hexa6'), 0.4, {opacity:1}, "+=0.65")
        .from($('.hexa6'), 0.4, {rotationY:-300, ease:Linear.easeNone}, "-=0.4")
        .from($('.hexa6'), 0.8, {scale:0,  ease:Elastic.easeOut.config(5, 0.5)}, "-=0.4")
        .from($('.hexa6'), 1.9, {x:-300, y:320, ease:eas}, "-=0.8");

    var hx7Tl = new TimelineMax();
    hx7Tl
        .to($('.hexa7'), 0.4, {opacity:1}, "+=0.72")
        .from($('.hexa7'), 0.5, {rotationX:400, ease:Linear.easeNone}, "-=0.4")
        .from($('.hexa7'), 0.8, {scale:0,  ease:Elastic.easeOut.config(5, 0.5)}, "-=0.5")
        .from($('.hexa7'), 2.1, {x:200, y:120, ease:eas}, "-=0.8");

    var hx8Tl = new TimelineMax();
    hx8Tl
        .to($('.hexa8'), 0.4, {opacity:1}, "+=0.9")
        .from($('.hexa8'), 0.5, {rotationX:-600, ease:Linear.easeNone}, "-=0.4")
        .from($('.hexa8'), 1.2, {scale:0,  ease:Elastic.easeOut.config(5, 0.5)}, "-=0.5")
        .from($('.hexa8'), 1.8, {x:400, y:120, ease:eas}, "-=1.2")
        .add(scr, "-=0.2");

    function scr(){
        $('.particle0_1 span').addClass('scr')
    }

    $('.hexa1').attr({'data-distancex':-40, 'data-distancey':50});
    $('.hexa2').attr({'data-distancex':50, 'data-distancey':100});
    $('.hexa3').attr({'data-distancex':-90, 'data-distancey':120});
    $('.hexa4').attr({'data-distancex':-80, 'data-distancey':170});
    $('.hexa5').attr({'data-distancex':-40, 'data-distancey':120});
    $('.hexa6').attr({'data-distancex':50, 'data-distancey':50});
    $('.hexa7').attr({'data-distancex':-50, 'data-distancey':70});
    $('.hexa8').attr({'data-distancex':40, 'data-distancey':100});

    var titTl = new TimelineMax();
    titTl
        .to($('.st0_1'), 0.6, {opacity:1}, "+=0.62")
        .from($('.st0_1'), 0.4, {scale:3, x:-1120, ease:Circ.easeIn}, "-=0.6")
        .to($('.st0_2'), 0.6, {opacity:1}, "-=0.6")
        .from($('.st0_2'), 0.4, {scale:3, x:1120, ease:Circ.easeIn}, "-=0.6")
        .to($('.bg0_1'), 1.6, {opacity:1, ease:Sine.easeInOut}, "-=0.4")
        .to($('.base2'), 1.4, {opacity:1}, "-=1.3")
        .to($('.btn1, .btn2'), 1, {opacity:1}, "-=1.2")
        .from($('.btn1'), 0.4, {x:-20,  ease:Sine.easeOut}, "-=1.2")
        .from($('.btn2'), 0.4, {x:20,  ease:Sine.easeOut}, "-=1.2");
}

})( jQuery );