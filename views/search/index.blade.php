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
                            <ul id="category">
                                @foreach($side_menu->anak as $submenu)
                                @if($submenu->parent == $side_menu->id)
                                <li>
                                    <a href="{{category_url($submenu)}}" id="submenu-child">{{$submenu->nama}}</a>
                                    @if($submenu->anak->count() != 0)
                                    <ul id="category">
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
                    @foreach(best_seller() as $best )
                    <li>
                        <a href="{{product_url($best)}}">
                            <div class="img-block">
                                <img src="{{url(product_image_url($best->gambar1,'thumb'))}}" width="70" height="70" alt="{{$best->nama}}" />
                            </div>
                            <p class="product-name">{{short_description($best->nama,25)}}</p>
                            @if(!empty($best->hargaCoret))
                            <p class="author"><del>{{price($best->hargaCoret)}}</del></p>
                            @endif
                            <p class="price">{{price($best->hargaJual)}}</p>
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
            @foreach(vertical_banner() as $banners)
            <div id="adv-sidebar">
                <a href="{{url($banners->url)}}">
                    {{HTML::image(banner_image_url($banners->gambar), 'Info Promo',array('width'=>'270','height'=>'388','class'=>'img-responsive'))}}
                </a>
            </div>
            @endforeach
        </div>
        <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
            <div class="product-list">
                @if($jumlahCari != 0)
                <div class="row">
                    <ul class="grid">
                        {{-- */ $i=1 /* --}}
                        @foreach($hasilpro as $produks)
                        <li class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                            <div class="prod-container">
                                <div class="image-container">
                                    <a href="{{product_url($produks)}}">
                                        <img class="img-responsive" src="{{url(product_image_url($produks->gambar1,'medium'))}}" alt="{{$produks->nama}}" />
                                    </a>
                                    @if(is_outstok($produks))
                                    <div class="icon-info icon-sold">Sold</div>
                                    @elseif(is_terlaris($produks))
                                    <div class="icon-info icon-sale">Best</div>
                                    @elseif(is_produkbaru($produks))
                                    <div class="icon-info icon-new">New</div>
                                    @endif
                                </div>
                                <div class="p-desc">
                                    <h5 class="product-name">{{short_description($produks->nama,30)}}</h5>
                                    <span class="price">{{price($produks->hargaJual)}}</span>
                                </div>
                            </div>
                        </li>
                        @if($i%2==0)
                        <div class="clearfix"></div>
                        @endif
                        {{-- */ $i++ /* --}}
                        @endforeach
                    </ul>
                </div>
                <div class="row">
                    @foreach($hasilhal as $hal)
                    <article class="col-lg-12" id="article">
                        <h3 id="blog-title">
                            <strong><a href="{{url('halaman/'.$hal->slug)}}">
                            {{$hal->judul}}</a></strong>
                        </h3>
                        <p>
                            {{short_description($hal->isi,300)}}<br><br>
                            <a href="{{url('halaman/'.$hal->slug)}}" class="theme">Baca Selengkapnya →</a>
                        </p>
                    </article>
                    @endforeach
                    @foreach($hasilblog as $blog_result)  
                    <article class="col-lg-12" id="hal-article">
                        <h3 id="blog-title">
                            <strong><a href="{{blog_url($blog_result)}}">{{$blog_result->judul}}</a></strong>
                        </h3>
                        <p id="tags-hal">
                            <small><i class="fa fa-calendar"></i> {{waktuTgl($blog_result->created_at)}}</small>&nbsp;&nbsp;
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
                <article class="text-center"><i>Hasil pencarian tidak ditemukan</i></article>
                @endif
            </div>
        </div>
    </div>
</div>