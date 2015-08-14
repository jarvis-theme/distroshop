define(['jquery','fancybox','owl_carousel'], function($,fancybox,owlCarousel)
{
	return new function(){
		var self = this;
		self.run = function(){

			$("a.fancybox").fancybox({
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'speedIn'		:	600, 
				'speedOut'		:	200, 
				'overlayShow'	:	false
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

			$('.product_quantity_up').click(function(e){
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('field');
                // Get its current value
                var currentVal = parseInt($('input[name='+fieldName+']').val());
                // If is not undefined
                if (!isNaN(currentVal)) {
                    // Increment
                    $('input[name='+fieldName+']').val(currentVal + 1);
                } else {
                    // Otherwise put a 0 there
                    $('input[name='+fieldName+']').val(0);
                }
            });

            // This button will decrement the value till 0
            $(".product_quantity_down").click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('field');
                // Get its current value
                var currentVal = parseInt($('input[name='+fieldName+']').val());
                // If it isn't undefined or its greater than 0
                if (!isNaN(currentVal) && currentVal > 0) {
                    // Decrement one
                    $('input[name='+fieldName+']').val(currentVal - 1);
                } else {
                    // Otherwise put a 0 there
                    $('input[name='+fieldName+']').val(0);
                }
            });
		};
	}
});