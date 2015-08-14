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
				{{ Theme::place('content') }}  
            </section>
			{{ Theme::partial('footer') }}  
		</div>
		
		{{ Theme::partial('defaultjs') }}
		{{ Theme::partial('analytic') }} 
	</body>
</html>