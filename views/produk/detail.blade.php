<div class="container">
    <div class="breadcrumb">
        <p>DETAIL PRODUK</p>
    </div>
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
                    @foreach(best_seller() as $best)
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
                <div class="btn-more">
                    <a href="{{url('produk')}}">Lihat Semua</a>
                </div>
            </div>
            @endif
            @foreach(vertical_banner() as $banners)
            <div id="adv-sidebar">
                <a href="{{URL::to($banners->url)}}">
                    {{HTML::image(banner_image_url($banners->gambar),'Info Promo',array('class'=>'img-responsive'))}}
                </a>
            </div>
            @endforeach
        </div>
        <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
            <div class="product-details">
                <form action="#" id="addorder">
                    <div class="row">
                        <div id="prod-left" class="col-lg-6 col-xs-12 col-sm-12">
                            <div class="big-image">
                                <img src="{{url(product_image_url($produk->gambar1,'medium'))}}" width="420" height="420" title="{{$produk->nama}}" alt="{{$produk->nama}}" />
                                <a class="zoom fancybox" href="{{url(product_image_url($produk->gambar1,'large'))}}" title="{{$produk->nama}}">&nbsp;</a>
                            </div>
                            <div id="thumb-view">
                                <ul id="thumb-list" class="owl-carousel owl-theme">
                                    @if($produk->gambar2 != '')
                                    <li class="item">
                                        <a class="fancybox" href="{{url(product_image_url($produk->gambar2,'large'))}}" title="{{$produk->nama}}">
                                            <img src="{{url(product_image_url($produk->gambar2,'thumb'))}}" width="134" height="133" alt="{{$produk->nama}}" />
                                        </a>
                                    </li>
                                    @endif
                                    @if($produk->gambar3 != '')
                                    <li class="item">
                                        <a class="fancybox" href="{{url(product_image_url($produk->gambar3,'large'))}}" title="{{$produk->nama}}">
                                            <img src="{{url(product_image_url($produk->gambar3,'thumb'))}}" width="134" height="133" alt="{{$produk->nama}}" />
                                        </a>
                                    </li>
                                    @endif
                                    @if($produk->gambar4 != '')
                                    <li class="item">
                                        <a class="fancybox" href="{{url(product_image_url($produk->gambar4,'large'))}}" title="{{$produk->nama}}">
                                            <img src="{{url(product_image_url($produk->gambar4,'thumb'))}}" width="134" height="133" alt="{{$produk->nama}}" />
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div id="prod-right" class="col-lg-6 col-xs-12 col-sm-12">
                            <h2 class="name-title">{{$produk->nama}}</h2>
                            @if(!empty($produk->hargaCoret))
                            <h3 class="author"><del>{{price($produk->hargaCoret)}}</del></h3>
                            @endif
                            <span class="price">{{price($produk->hargaJual)}}</span>
                            <div class="img-rating">
                                {{sosialShare(url(product_url($produk)))}}
                            </div>
                            <div class="desc-prod">
                                <p class="title">Deskripsi Produk :</p>
                                <p>{{short_description($produk->deskripsi, 500)}}</p>
                            </div>
                            @if($opsiproduk->count() > 0)
                            <div class="size-list">
                                <div class="form-group">
                                    <label class="control-label">Opsi :</label>
                                    <div>
                                        <select class="form-control attribute_select" name="opsiproduk">
                                            <option value="">-- Pilih Opsi --</option>
                                            @foreach ($opsiproduk as $key => $opsi)
                                            <option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >
                                                {{ucwords($opsi->opsi1).($opsi->opsi2=='' ? '':' / '.ucwords($opsi->opsi2)).($opsi->opsi3=='' ? '':' / '.ucwords($opsi->opsi3))}} - {{price($opsi->harga)}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="quantity">
                                <div class="form-group">
                                    <label class="control-label">Jumlah :</label>
                                    <div class="qty-block">
                                        <a href="#" data-field-qty="qty" class="product_quantity_down" field='qty'>
                                            <span><i class="icon-minus"></i></span>
                                        </a>
                                        <input type="text" name="qty" id="qty" class="text" value="1" pattern="[0-9]" />
                                        <a href="#" data-field-qty="qty" class="product_quantity_up" field='qty'>
                                            <span><i class="icon-plus"></i></span>
                                        </a>
                                        <span class="clearfix"></span>
                                    </div>
                                 </div>
                            </div>
                            <div class="avail-info">
                                @if(!empty($produk->stok))
                                <span class="instock">Available, Stock <span class="ttl-stock">{{$produk->stok}} item</span></span>
                                @else
                                <span class="fa-stack fa-1x">
                                    <i id="empty" class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-close fa-stack-1x fa-inverse"></i>
                                </span>
                                Out of Stock
                                @endif
                            </div>
                        </div>
                        <div class="clr"></div>
                    </div>
                    <div class="btm-details">
                        <div class="button-detail fr">
                            <button class="btn addtocart"><i class="cart"></i>Beli</button>
                        </div>
                        <div class="clr"></div>
                    </div>
                </form>
            </div>
            @if(other_product($produk, 4)->count() > 0)
            <div id="related-product" class="product-list">
                <h2 class="title">Produk Lainnya</h2>
                <div class="row">
                    <ul class="grid">
                        {{-- */ $i=1 /* --}}
                        @foreach(other_product($produk,4) as $relproduk)
                        @if($i == 4)
                        <li class="col-xs-6 col-sm-4 col-md-4 col-lg-4 visible-xs">
                        @else
                        <li class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                        @endif
                            <div class="prod-container">
                                <div class="image-container">
                                    <a href="{{product_url($relproduk)}}">
                                        <img class="img-responsive" src="{{url(product_image_url($relproduk->gambar1,'medium'))}}" alt="{{$relproduk->nama}}" />
                                    </a>
                                    @if(is_outstok($relproduk))
                                    <div class="icon-info icon-sold">Sold</div>
                                    @elseif(is_terlaris($relproduk))
                                    <div class="icon-info icon-new">Best</div>
                                    @elseif(is_produkbaru($relproduk))
                                    <div class="icon-info icon-promo">New</div>
                                    @endif
                                </div>
                                <h5 class="product-name">{{short_description($relproduk->nama,15)}}</h5>
                                <span class="price">{{price($relproduk->hargaJual)}}</span>
                                <a class="view btn-small" href="{{product_url($relproduk)}}">Detail</a>
                            </div>
                        </li>
                        @if($i%2 == 0)
                        <div class="visible-xs clr"></div>
                        @endif
                        {{-- */ $i++ /* --}}
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            {{ pluginComment(product_url($produk), @$produk) }}
        </div> 
    </div>
</div>