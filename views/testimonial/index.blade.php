<div class="container">
	<div class="breadcrumb"><p>Testimonial</p></div>
	<div class="inner-column row">
        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
            <div id="categories" class="block">
                <div class="title"><h2>Kategori Produk</h2></div>
                <ul class="block-content">
                    @if(list_category()->count() > 0)
                    <div class="accordion-widget">
                        <div class="accordion">
                            @foreach(list_category() as $side_menu)
                            @if($side_menu->parent == '0')
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    @if(count($side_menu->anak) >= 1)
                                    <a href="{{category_url($side_menu)}}"><span class="accordion-toggle collapsed" data-toggle="collapse" href="#{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', strtolower($side_menu->nama)),23)}}"></span>
                                    @else
                                    <a class="collapsed" href="{{category_url($side_menu)}}">
                                    @endif  
                                        {{$side_menu->nama}}
                                    </a>
                                </div>
                                @if($side_menu->anak->count() != 0)
                                <div id="{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', strtolower($side_menu->nama)),23)}}" class="accordion-body collapse submenu">
                                    <div class="accordion-inner">
                                        @foreach($side_menu->anak as $submenu)
                                        @if($submenu->parent == $side_menu->id)
                                            <div class="accordion-heading">
                                                @if(count($submenu->anak) > 0 )
                                                <a href="{{category_url($submenu)}}"><span href="#{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', strtolower($submenu->nama)),23)}}" class="accordion-toggle collapsed submenu" data-toggle="collapse"></span>
                                                @else
                                                <a href="{{category_url($submenu)}}" class="collapsed">
                                                @endif
                                                    {{$submenu->nama}}
                                                </a>
                                            </div>
                                            @if($submenu->anak->count() != 0)
                                            <div id="{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', strtolower($submenu->nama)),23)}}" class="accordion-body collapse">
                                                <ul>
                                                    @foreach($submenu->anak as $submenu2)
                                                    @if($submenu2->parent == $submenu->id)
                                                    <li><a href="{{category_url($submenu2)}}">{{$submenu2->nama}}</a></li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @endif
                </ul>
            </div>
            @if(best_seller()->count() > 0)
            <div id="best-seller" class="block">
                <div class="title"><h2>Produk Terlaris</h2></div>
                <ul class="block-content">
                    @foreach(best_seller() as $bestproduk )
                    <li>
                        <a href="{{product_url($bestproduk)}}">
                            <div class="img-block">
                                {{HTML::image(product_image_url($bestproduk->gambar1,'thumb'), $bestproduk->nama, array('class'=>'img-responsive','id'=>'img-best'))}}
                            </div>
                            <p class="product-name">{{short_description($bestproduk->nama,15)}}</p>
                            @if(!empty($bestproduk->hargaCoret))
                            <p class="author"><del>{{price($bestproduk->hargaCoret)}}</del></p>
                            @endif
                            <p class="price">{{price($bestproduk->hargaJual)}}</p> 
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="btn-more"><a href="{{url('produk')}}">Lihat Semua</a></div>
            </div>
            @endif
            <div id="latest-news" class="block">
            	<div class="title"><h2>Artikel Terbaru</h2></div>
            	<ul class="block-content">
                   @foreach(list_blog(3) as $value)
                    <li>
                        <h5 class="title-news">{{$value->judul}}</h5>
                        <p>{{short_description($value->isi,55)}}<a class="read-more" href="{{blog_url($value)}}">Selengkapnya</a></p>
                        <span class="date-post">{{date("d M Y", strtotime($value->created_at))}}</span>
                    </li> 
                    @endforeach
                </ul>
            </div>
        </div>

        <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
            @foreach (list_testimonial() as $items)  
        	<div class="panel panel-default">
        		<div class="panel-heading">
        			<h4 class="panel-title">{{$items->nama}}</h4>
        		</div>
    			<div class="panel-body">"{{$items->isi}}"</div>
        	</div>
            @endforeach
            <div class="row">
            	<div class="col-md-12">{{list_testimonial()->links()}}</div>
            </div>
            
            <div class="respond">
                <h3 id="title-testi">Kirim Testimonial</h3>
                <form method="post" action="{{url('testimoni')}}" role="form">
                	<div class="form-group">
                		<label for="name">Nama</label>
                		<input type="text" class="form-control" name="nama" id="name" required>
                	</div>
                	<div class="form-group">
                		<label for="exampleInputEmail1">Testimonial</label>
                		<textarea name="testimonial" class="form-control" rows="3" required></textarea>
                	</div>
                	<button class="btn btn-info" type="submit">Kirim</button>
                	<button class="btn btn-default" type="reset">Reset</button>
                </form>
            </div>
        </div> 
    </div>
</div>