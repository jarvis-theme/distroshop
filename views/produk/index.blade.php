<div class="container">
    <div class="breadcrumb">
        <p>PRODUK</p>
    </div>
    <div class="inner-column row">
        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
            <div id="categories" class="block">
                <div class="title"><h2>Kategori Produk</h2></div>
                <ul class="block-content">
                @foreach(list_category() as $side_menu)
                    @if($side_menu->parent == '0')
                    <li>
                        <a href="{{category_url($side_menu)}}">{{$side_menu->nama}} <!-- <span class="arrow-right"></span> --></a>
                        @if($side_menu->anak->count() != 0)
                        <ul style="padding: 0px 20px;">
                            @foreach(list_category() as $submenu)
                            @if($submenu->parent == $side_menu->id)
                            <li>
                                <a href="{{category_url($submenu)}}">{{$submenu->nama}}</a>
                                @if($submenu->anak->count() != 0)
                                <ul style="padding: 0px 20px;">
                                    @foreach($submenu->anak as $submenu2)
                                    @if($submenu2->parent == $submenu->id)
                                    <li>
                                        <a href="{{category_url($submenu2)}}">{{$submenu2->nama}}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endif
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endif
                @endforeach
                </ul>
            </div>
            <div id="best-seller" class="block">
                <div class="title"><h2>Produk Terlaris</h2></div>
                <ul class="block-content">
                    @foreach(best_seller() as $best)
                    <li>
                        <a href="{{product_url($best)}}">
                            <div class="img-block">
                                <img src="{{url(product_image_url($best->gambar1,'thumb'))}}" width="70" height="70" alt="" />
                            </div>
                            <p class="product-name">{{short_description($best->nama,25)}}</p>
                            <p class="price">{{$best->hargaJual}}</p>
                            <p class="desc">{{short_description($best->deskripsi,37)}}</p> 
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="btn-more">
                    <a href="{{url('produk')}}">view more</a>
                </div>
            </div>
            <div id="latest-news" class="block">
                <div class="title"><h2>Artikel Terbaru</h2></div>
                <ul class="block-content">
                    @foreach(list_blog() as $blog)
                    <li>
                        <h5 class="title-news">{{short_description($blog->judul,30)}}</h5>
                        <p>{{short_description($blog->isi,46)}} <a class="read-more" href="{{blog_url($blog)}}">Read More</a></p>
                        <span class="date-post">{{date("F d, Y", strtotime($blog->created_at))}}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div id="adv-sidebar" class="block">
                @foreach(vertical_banner() as $banners)
                <a href="{{URL::to($banners->url)}}">
                    {{HTML::image(banner_image_url($banners->gambar),'banner',array('class'=>'img-responsive'))}}
                </a>
                @endforeach
            </div>
        </div>
        <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
            <div class="product-list">
                <div class="row">
                    <ul class="grid">
                        @foreach(list_product(null, @$category) as $product)
                        <li class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                            <div class="prod-container">
                                <div class="image-container">
                                    <a href="{{product_url($product)}}"><img class="img-responsive" src="{{url(product_image_url($product->gambar1,'medium'))}}" alt="product" /></a>
                                    @if(is_outstok($product))
                                    <div class="icon-info icon-sold">Sold</div>
                                    @elseif(is_terlaris($product))
                                    <div class="icon-info icon-new">Best</div>
                                    @elseif(is_produkbaru($product))
                                    <div class="icon-info icon-sale">New</div>
                                    @endif
                                </div>
                                <div class="p-desc">
                                    <h5 class="product-name">{{short_description($product->nama,30)}}</h5>
                                    <span class="price">{{price($product->hargaJual)}}</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div><!--.row-->
            </div><!--.product_list-->
            <div class="clr"></div>
            <div class="content_sortPagiBar">
                {{list_product(null, @$category, @$collection)->links()}}
                <div class="clr"></div>
            </div> <!--.content_sortPagiBar-->
        </div> <!--.center_column-->
    </div><!--.inner-column-->  
</div>