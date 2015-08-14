<div class="container">
    <div class="breadcrumb"><p>Hasil Pencarian</p></div>
    <div class="inner-column row">
        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
            <div id="categories" class="block">
                <div class="title"><h2>Kategori</h2></div>
                <ul class="block-content">
                    @foreach(list_category() as $side_menu)
                        @if($side_menu->parent == '0')
                        <li>
                            <a href="{{category_url($side_menu)}}">{{$side_menu->nama}}</a>
                            @if($side_menu->anak->count() != 0)
                            <ul style="padding: 0px 20px;">
                                @foreach($side_menu->anak as $submenu)
                                @if($submenu->parent == $side_menu->id)
                                <li>
                                    <a href="{{category_url($submenu)}}" style="background-color:transparent">{{$submenu->nama}}</a>
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
            @if(count(best_seller()) > 0)
            <div id="best-seller" class="block">
                <div class="title"><h2>Produk Terlaris</h2></div>
                <ul class="block-content">
                    @foreach(best_seller() as $bestproduk )
                    <li>
                        <a href="{{product_url($bestproduk)}}">
                            <div class="img-block">
                            {{HTML::image(product_image_url($bestproduk->gambar1,'thumb'), 'produk', array('class'=>'img-responsive','product'=>'height:81px; margin: 0 auto;'))}}
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
                <div class="btn-more"><a href="{{url('produk')}}">view more</a></div>
            </div>
            @endif
            <div id="latest-news" class="block">
                <div class="title"><h2>Artikel <strong>Terbaru</strong></h2></div>
                <ul class="block-content">
                    @foreach(list_blog(3) as $value)
                    <li>
                        <h5 class="title-news">{{$value->judul}}</h5>
                        <p>{{short_description($value->isi,55)}}...<a class="read-more" href="{{blog_url($value)}}">Read More</a></p>
                        <span class="date-post">{{date("d M Y", strtotime($value->created_at))}}</span>
                    </li> 
                    @endforeach
                </ul>
            </div>
            <div id="adv-sidebar" class="block">
                @foreach(vertical_banner() as $banners)
                <a href="{{url($banners->url)}}">
                    {{HTML::image(banner_image_url($banners->gambar),'banner',array('width'=>'270','height'=>'388','class'=>'img-responsive'))}}
                </a>
                @endforeach
            </div>
        </div>
        <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
            <div class="product-list">
                @if($jumlahCari != 0)
                <div class="row">
                    <ul class="grid">
                        @foreach($hasilpro as $produks)
                        <li class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="prod-container">
                                <div class="image-container">
                                    <a href="{{product_url($produks)}}">
                                        {{HTML::image(product_image_url($produks->gambar1), 'produk', array('class'=>'img-responsive','product'=>'height:263px; margin: 0 auto;'))}}
                                    </a>
                                    @if(is_outstok($produks))
                                    <div class="icon-info icon-sold">Sold</div>
                                    @elseif(is_terlaris($produks))
                                    <div class="icon-info icon-sale">Hot Item</div>
                                    @elseif(is_produkbaru($produks))
                                    <div class="icon-info icon-new">New</div>
                                    @endif
                                </div>
                                <h5 class="product-name">{{$produks->nama}}</h5>
                                @if(!empty($produks->hargaCoret))
                                <p class="author"><del>{{price($produks->hargaCoret)}}</del></p>
                                @endif
                                <span class="price">{{price($produks->hargaJual)}}</span>
                                <a href="{{product_url($produks)}}" class="buy-btn">Buy Now</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="row">
                    @foreach($hasilhal as $hal)
                    <article class="col-lg-12" style="margin-bottom:10px">
                        <h3 style="margin-bottom: 3px;">
                            <strong><a href="{{url('halaman/'.$hal->slug)}}">
                            {{$hal->judul}}</a></strong>
                        </h3>
                        <p>
                            {{short_description($hal->isi,300)}}<br>
                            <a href="{{url('halaman/'.$hal->slug)}}" class="theme">Baca Selengkapnya →</a>
                        </p>
                    </article>
                    @endforeach
                    @foreach($hasilblog as $blog_result)  
                    <article class="col-lg-12" style="margin-bottom:10px">
                        <h3 style="margin-bottom: 3px;">
                            <strong><a href="{{blog_url($blog_result)}}">{{$blog_result->judul}}</a></strong>
                        </h3>
                        <p style="margin-bottom: 15px;">
                            <small><i class="fa fa-calendar"></i> {{waktuTgl($blog_result->updated_at)}}</small>&nbsp;&nbsp;
                            <span class="date-post"><i class="fa fa-tags"></i> <a href="{{blog_category_url(@$blog_result->kategori)}}">{{@$blog_result->kategori->nama}}</a></span>
                        </p>
                        <p>
                            {{short_description($blog_result->isi,300)}}<br>
                            <a href="{{blog_url($blog_result)}}" class="theme">Baca Selengkapnya →</a>
                        </p>
                        <hr>
                    </article>
                    @endforeach 
                </div>
                @else
                <article class="text-center">
                    <i>Hasil pencarian tidak ditemukan</i>
                </article>
                @endif
            </div>
        </div>
    </div>
</div>