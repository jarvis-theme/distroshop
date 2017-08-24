<div id="big-slider">
    <div class="container">
        <ul class="slides">
            @foreach (slideshow() as $val)
            <li>
                @if(!empty($val->url))
                <a href="{{filter_link_url($val->url)}}" target="_blank">
                @else
                <a href="#">
                @endif
                    {{HTML::image(slide_image_url($val->gambar), $val->title, array('width'=>'1170', 'class'=>'img-responsive'))}}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>