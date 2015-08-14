<div class="container">
    <div class="breadcrumb">
        <p>DETAIL PRODUK</p>
    </div>
    <div class="inner-column row">
        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
            <div id="categories" class="block">
                <div class="title"><h2>Kategori Produk</h2></div>
                <ul class="block-content">
                @foreach(list_category() as $side_menu)
                    @if($side_menu->parent == '0')
                    <li>
                        <a href="{{category_url($side_menu)}}">{{$side_menu->nama}}</a>
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
                            @if(!empty($best->hargaCoret))
                            <p class="author"><del>{{price($best->hargaCoret)}}</del></p>
                            @endif
                            <p class="price">{{price($best->hargaJual)}}</p> 
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="btn-more">
                    <a href="{{url('produk')}}">view more</a>
                </div>
            </div>
            <div id="adv-sidebar">
                @foreach(vertical_banner() as $banners)
                <a href="{{URL::to($banners->url)}}">
                    {{HTML::image(banner_image_url($banners->gambar),'banner',array('class'=>'img-responsive'))}}
                </a>
                @endforeach
            </div>
        </div><!--#left_sidebar-->
        <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
            <div class="product-details">
                <form action="#" id="addorder">
                    <div class="row">
                        <div id="prod-left" class="col-lg-6 col-xs-12 col-sm-12">
                            <div class="big-image">
                                <img src="{{url(product_image_url($produk->gambar1,'medium'))}}" width="420" height="420" title="{{$produk->nama}}" />
                                <a class="zoom fancybox" href="{{url(product_image_url($produk->gambar1,'large'))}}" title="{{$produk->nama}}">&nbsp;</a>
                            </div>
                            <div id="thumb-view">
                                <ul id="thumb-list" class="owl-carousel owl-theme">
                                    @if($produk->gambar2 != '')
                                    <li class="item"><a class="fancybox" href="{{url(product_image_url($produk->gambar2,'large'))}}" title="{{$produk->nama}}"><img src="{{url(product_image_url($produk->gambar2,'thumb'))}}" width="134" height="133" /></a></li>
                                    @endif
                                    @if($produk->gambar3 != '')
                                    <li class="item"><a class="fancybox" href="{{url(product_image_url($produk->gambar3,'large'))}}" title="{{$produk->nama}}"><img src="{{url(product_image_url($produk->gambar3,'thumb'))}}" width="134" height="133" alt="" /></a></li>
                                    @endif
                                    @if($produk->gambar4 != '')
                                    <li class="item"><a class="fancybox" href="{{url(product_image_url($produk->gambar4,'large'))}}" title="{{$produk->nama}}"><img src="{{url(product_image_url($produk->gambar4,'thumb'))}}" width="134" height="133" alt="" /></a></li>
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
                                <p>{{$produk->deskripsi}}</p>
                            </div>
                            @if($opsiproduk->count() > 0)
                            <div class="size-list">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Opsi :</label>
                                    <div class="col-sm-5">
                                        <select class="form-control attribute_select" name="opsiproduk">
                                            <option value="">-- Pilih Opsi --</option>
                                            @foreach ($opsiproduk as $key => $opsi)
                                            <option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >
                                                {{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{price($opsi->harga)}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="quantity">
                                <div class="form-group">
                                    <label class="control-label">Quantity :</label>
                                    <div class="qty-block">
                                        <a href="#" data-field-qty="qty" class="product_quantity_down" field='qty'>
                                            <span><i class="icon-minus"></i></span>
                                        </a>
                                        <input type="text" name="qty" id="qty" class="text" value="1" />
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
                                    <i style="color: #d9534f;" class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-close fa-stack-1x fa-inverse"></i>
                                </span>
                                Out of Stock
                                @endif
                            </div>
                        </div>
                        <div class="clr"></div>
                    </div><!--.row-->
                    <div class="btm-details">
                        <div class="bank-logo fl">
                            <!-- <img class="img-responsive" src="images/bank.png" width="461" height="37" alt="" /> -->
                        </div>
                        <div class="button-detail fr">
                            <button class="btn addtocart"><i class="cart"></i>Add to cart</button>
                        </div>
                        <div class="clr"></div>
                    </div>
                </form>
            </div><!--.product-details-->
            @if(count(other_product($produk, 3)) > 0)
            <div id="related-product" class="product-list">
                <h2 class="title">Related Product</h2>
                <div class="row">
                    <ul class="grid">
                        @foreach(other_product($produk,3) as $relproduk)
                        <li class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                            <div class="prod-container">
                                <div class="image-container">
                                    <a href="{{product_url($relproduk)}}"><img class="img-responsive" src="{{url(product_image_url($relproduk->gambar1,'medium'))}}" alt="product" /></a>
                                    @if(is_outstok($relproduk))
                                    <div class="icon-info icon-sold">Sold</div>
                                    @elseif(is_terlaris($relproduk))
                                    <div class="icon-info icon-new">Best</div>
                                    @elseif(is_produkbaru($relproduk))
                                    <div class="icon-info icon-promo">New</div>
                                    @endif
                                </div>
                                <h5 class="product-name">{{$relproduk->nama}}</h5>
                                <span class="price">{{price($relproduk->hargaJual)}}</span>
                                <a class="view btn-small" href="{{product_url($relproduk)}}">See Details</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div><!--.product-list-->
            @endif

            {{pluginTrustklik()}}
        </div> <!--.center_column-->
    </div><!--.inner-column-->  
</div>