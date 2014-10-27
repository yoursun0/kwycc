$(document).ready(function(){
	
	$('.list-view').click(function(){
		$('.list-view').hide();
		$('.grid-view').show();	
		$('#view_1').fadeOut(150);
		$('#view_2').delay(100).fadeIn(150);
	});
	
	$('.grid-view').click(function(){
		$('.grid-view').hide();
		$('.list-view').show();	
		$('#view_2').fadeOut(150);
		$('#view_1').delay(100).fadeIn(150);
	});
	
	$('.filter-btn').click(function(){
		$('#filter-menu').fadeToggle(200);
	});
	
	$('.pad').click(function(){
		$('#filter-menu').fadeOut(200);
	});
	
	
	$('.toggle-menu-btn').click(function(){
		$('#toggle-menu').slideToggle(200);
		
	});
	
	
});

$( window ).resize(function() {
	toggleMenuHide ();
});

function toggleMenuHide (){
	var winW = $(window).width();
	
	if( winW > 960 ){
		$('#toggle-menu').hide();	
	}
}


function slideChange(args) {

	$('.sliderContainer .slideSelectors .item').removeClass('selected');
	$('.sliderContainer .slideSelectors .item:eq(' + args.currentiosSliderNumber + ')').addClass('selected');
	try {
		console.log(args);
	} catch(err) {
	}
	
}

function slideComplete(args) {
		
	$(args.sliderObject).find('.text1, .text2, .slide-learn-more').attr('style', '');
	
	$(args.currentiosSliderObject).find('.text1').animate({
		right: '100px',
		opacity: '0.8'
	}, 2000, 'easeOutQuint');
	
	$(args.currentiosSliderObject).find('.text2').delay(500).animate({
		right: '50px',
		opacity: '0.8'
	}, 2000, 'easeOutQuint');
	
	$(args.currentiosSliderObject).find('.slide-learn-more').delay(800).animate({
		right: '50px',
		opacity: '1'
	}, 2000, 'easeOutQuint');
	
	
}

function sliderLoaded(args) {
		
	slideComplete(args);
	
	slideChange(args);
	
}