$(window).load(function() {
	// PRELOADER
	if ($('body').hasClass('hide')) {
		$('.preloader').fadeOut(1000, function(){
			setTimeout(function(){$('.preloader').remove(); },2000);
			$('body').removeClass('hide');
		});
		$('body').removeClass('hide');
	} else {
		$('.preloader').fadeOut(1000, function(){
			$('.preloader').remove();
		});
	}
			
	// SLIDER PRODUCT HOME
	$('#big-slider .slides').owlCarousel({
		itemsCustom : [
			[350, 1],
			[450, 1],
			[600, 1],
			[700, 1],
			[1000, 1],
			[1200, 1],
			[1400, 1]
		],
		navigation : true,
		pagination: true,
		navigationText: false
	});
	
	//THUMB LIST
	$('#thumb-list').owlCarousel({
		itemsCustom : [
			[350, 2],
			[350, 3],
			[600, 4],
			[700, 4],
			[1000, 4],
			[1200, 3],
			[1400, 3]
		],
		navigation : true,
		pagination: false,
		navigationText: false,
		margin:10
	});
	
	
	
});

/*$(document).ready(function() {
	$('footer h4.title').click(function() {
		$(this).toggleClass('active');
		$(this).next().slideToggle(250);
	});
});*/