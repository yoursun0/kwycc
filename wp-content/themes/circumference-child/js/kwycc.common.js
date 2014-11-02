jQuery(document).ready(function(){
	
	jQuery('.toggle-menu-btn').click(function(){
		jQuery('#toggle-menu').slideToggle(200);
		jQuery('.slidernav ul.nav').toggle(10);
	});
	
	
});

jQuery( window ).resize(function() {
	toggleMenuHide ();
});

function toggleMenuHide (){
	var winW = jQuery(window).width();
	
	if( winW > 912 ){
		jQuery('#toggle-menu').hide();	
	}
}


function slideChange(args) {

	jQuery('.sliderContainer .slideSelectors .item').removeClass('selected');
	jQuery('.sliderContainer .slideSelectors .item:eq(' + args.currentiosSliderNumber + ')').addClass('selected');
	try {
		console.log(args);
	} catch(err) {
	}
	
}

function slideComplete(args) {
		
	jQuery(args.sliderObject).find('.text1, .text2, .slide-learn-more').attr('style', '');
	
	jQuery(args.currentiosSliderObject).find('.text1').animate({
		right: '100px',
		opacity: '0.8'
	}, 2000, 'easeOutQuint');
	
	jQuery(args.currentiosSliderObject).find('.text2').delay(500).animate({
		right: '50px',
		opacity: '0.8'
	}, 2000, 'easeOutQuint');
	
	jQuery(args.currentiosSliderObject).find('.slide-learn-more').delay(800).animate({
		right: '50px',
		opacity: '1'
	}, 2000, 'easeOutQuint');
	
	
}

function sliderLoaded(args) {
		
	slideComplete(args);
	
	slideChange(args);
	
}