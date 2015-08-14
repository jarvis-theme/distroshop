    {{generate_theme_css('distroshop/assets/css/reset.css')}}
    {{generate_theme_css('distroshop/assets/css/bootstrap.css')}}
    {{generate_theme_css('distroshop/assets/css/font-awesome.min.css')}}
    @if($tema->isiCss=='')  
    {{generate_theme_css('distroshop/assets/css/style.css')}}
    @else   
    {{generate_theme_css('distroshop/assets/css/editstyle.css')}}
    @endif  
    {{generate_theme_css('distroshop/assets/css/flexslider.css')}}
    {{generate_theme_css('distroshop/assets/css/owl.carousel.css')}}
    {{generate_theme_css('distroshop/assets/css/owl.theme.css')}}
    {{generate_theme_css('distroshop/assets/css/jquery.fancybox.css')}}
    {{generate_theme_js('distroshop/assets/js/lib/modernizr.custom.28468.js')}}

    {{favicon()}}
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>

    <noscript>
        {{generate_theme_css('distroshop/assets/css/nojs.css')}}
    </noscript>