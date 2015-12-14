define(['jq_flexslider','owl_carousel'], function(flexslider,owlCarousel)
{
	return new function(){
		var self = this;
		self.run = function(){
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
				navigationText: false,
				autoPlay: true
			});
		};
	}
});