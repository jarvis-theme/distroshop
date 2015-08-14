<!DOCTYPE html>
<html lang="en">
    <head>
        {{ Theme::partial('seostuff') }} 
        {{ Theme::partial('defaultcss') }}  
        {{ Theme::asset()->styles() }}  
    </head>
    <body>
        <div class="preloader"></div>
        <div class="page">
            {{ Theme::partial('header') }} 
            <section id="main-content">
                {{ Theme::partial('slider') }} 
                <div class="container">
                    {{ Theme::place('content') }}  
                </div>
            </section>
            {{ Theme::partial('footer') }}  
        </div>
        {{ Theme::partial('defaultjs') }}
        {{ Theme::partial('analytic') }} 
    </body>
</html>