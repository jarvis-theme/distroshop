    {{favicon()}}   
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    {{generate_theme_css('distroshop/assets/css/reset.css')}}
    {{generate_theme_css('distroshop/assets/css/bootstrap-custom.css')}}
    
    @if($tema->isiCss=='')  
    {{generate_theme_css('distroshop/assets/css/style.css')}}
    @else   
    {{generate_theme_css('distroshop/assets/css/editstyle.css')}}
    @endif  
    
    <noscript>
        {{generate_theme_css('distroshop/assets/css/nojs.css')}}
    </noscript>
    
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
