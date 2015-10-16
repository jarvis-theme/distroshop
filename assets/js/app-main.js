var dirTema = document.querySelector("meta[name='theme_path']").getAttribute('content');

require.config({
	baseUrl: '/',
    urlArgs: "v=003",
	waitSeconds: 60,
	shim: {
		"jq_flexslider" : {
			deps : ['jquery'],
		},
		"owl_carousel" : {
			deps: ['jquery'],
		},
		"noty" : {
			deps : ['jquery'],
		},
		"noty_util" : {
			deps : ['jquery','noty'],
		},
		"bootstrap"	: {
			deps: ['jquery'],
		},
		"cart" : {
			deps : ['jquery'],
		},
		'fancybox' : {
			deps : ['jquery']
		},
		'jq_ui' : {
			deps : ['jquery'],
		},
	},

	paths: {
		// LIBRARY
		jquery 			: '//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min',
		cart			: 'js/shop_cart',
		jq_ui			: 'js/jquery-ui',
		noty			: 'js/jquery.noty',
		noty_util		: 'js/utils/noty',
		bootstrap		: '//maxcdn.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min',
		fancybox		: dirTema+'/assets/js/lib/jquery.fancybox.pack',
		jq_flexslider	: dirTema+'/assets/js/lib/jquery.flexslider-min',
		modernizr		: dirTema+'/assets/js/lib/modernizr.custom.28468',
		owl_carousel	: dirTema+'/assets/js/lib/owl.carousel.min',
		
		// ROUTE
		router          : 'js/router',

		// CONTROLLER
		home            : dirTema+'/assets/js/pages/home',
		produk          : dirTema+'/assets/js/pages/produk',
		main	        : dirTema+'/assets/js/pages/default',
	}
});
require([
	'jquery',
	'router',
	'cart',
	'noty_util',
	'main'
], function($,router,cart,noty,main)
{
	router.define('/', 'home@run');
	router.define('home', 'home@run');
	router.define('produk/*', 'produk@run');
	router.run();
	noty.run();
	cart.run();
	main.run();
});