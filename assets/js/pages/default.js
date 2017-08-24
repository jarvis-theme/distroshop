define(['jq_flexslider','owl_carousel'], function(flexslider,owlCarousel)
{
	return new function(){
		var self = this;
		self.run = function(){
			$('.sidebanner').owlCarousel({
				itemsCustom : [
					[350, 1],
					[450, 1],
					[600, 1],
					[700, 1],
					[1000, 1],
					[1200, 1],
					[1400, 1]
				],
				navigation : false,
				pagination: false,
				navigationText: false,
				autoPlay: true
			});
		};
	}
});