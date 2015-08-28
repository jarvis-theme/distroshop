<div class="container">
	<div class="breadcrumb"><p>Syarat Dan Ketentuan</p></div>
	<div class="inner-column row">
		<div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
			<div id="latest-news" class="block">
                <div class="title"><h2>Artikel Terbaru</h2></div>
                <ul class="block-content">
                    @foreach(list_blog(2) as $blogs)
                    <li>
                        <h5 class="title-news">{{$blogs->judul}}</h5>
                        <p>{{short_description($blogs->isi, 150)}}<a class="read-more" href="{{blog_url($blogs)}}">Read More</a></p>
                        <span class="date-post">{{date("F d, Y", strtotime($blogs->created_at))}}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            @foreach(vertical_banner() as $banners)
            <div id="adv-sidebar">
                <a href="{{url($banners->url)}}">
                    {{HTML::image(banner_image_url($banners->gambar),'banner',array('width'=>'270','height'=>'388','class'=>'img-responsive'))}}
                </a>
            </div>
            @endforeach
		</div>
		<div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								Term Of Service
							</a>
						</h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
		                	<p>{{$service->tos}}</p>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingTwo">
						<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								Refund Policy
							</a>
						</h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						<div class="panel-body">
		                	<p>{{$service->refund}}</p>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingThree">
						<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								Privacy Policy
							</a>
						</h4>
					</div>
					<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
		                	<p>{{$service->privacy}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>