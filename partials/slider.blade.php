<div id="big-slider">
    <div class="container">
        <ul class="slides">
            @foreach (slideshow() as $val)  
            <li>
                @if($val->text == '')
            	<a href="#">
                @else
                <a href="{{filter_link_url($val->text)}}" target="_blank">
                @endif
                	{{HTML::image(slide_image_url($val->gambar), 'slide', array('width'=>'1170', 'height'=>'264', 'class'=>'img-responsive'))}}
            	</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>