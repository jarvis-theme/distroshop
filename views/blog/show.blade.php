<div class="container">
    <div class="breadcrumb"><p><strong>Detail Blog</strong></p></div>
    <div class="inner-column row">
        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
            <div id="latest-news" class="block">
                <div class="title"><h2>Kategori</h2></div>
                <ul class="block-content">
                    @foreach(list_blog_category() as $kat)
                    <span style="text-decoration: underline;"><a href="{{blog_category_url($kat)}}">{{$kat->nama}}</a></span>&nbsp;&nbsp;
                    @endforeach 
                </ul>
            </div>
            <div id="best-seller" class="block">
                <div class="title"><h2>Best <strong>Seller</strong></h2></div>
                <ul class="block-content">
                    @foreach(best_seller() as $bestproduk )
                    <li>
                        <a href="{{product_url($bestproduk)}}">
                            <div class="img-block">
                                {{HTML::image(product_image_url($bestproduk->gambar1,'thumb'), 'Best Seller', array('class'=>'img-responsive','style'=>'height:81px; margin: 0 auto;'))}}
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
                <div class="btn-more"><a href="{{url('koleksi/best-seller')}}">view more</a></div>
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
            <div class="product-list">
                <section class="content">
                    <div class="entry">
                        <h2 class="title" style="margin-bottom: 8px">{{$detailblog->judul}}</h2>
                        <ul class="col-xs-12 col-sm-8" style="margin-bottom: 25px;">
                            <small>
                                <span class="date-post"><i class="fa fa-calendar"></i> {{waktuTgl($detailblog->created_at)}}</span>&nbsp;&nbsp;
                                <span class="date-post"><i class="fa fa-tags"></i> <a href="{{blog_category_url(@$detailblog->kategori)}}">{{@$detailblog->kategori->nama}}</a></span>
                            </small>
                        </ul>
                        <div class="col-xs-12 col-sm-4 sosial-share" style="margin-bottom: 25px;">{{sosialShare(blog_url($detailblog))}}</div>
                        <p style="margin-top: 25px;">{{$detailblog->isi}}</p>
                    </div><!--entry-->
                    <hr>
                    <div class="navigate comments clearfix">
                    @if(isset($prev))
                        <div class="pull-left"><a href="{{$prev->slug}}">&larr; Sebelumnya</a></div>
                    @else
                        <div class="pull-right"></div>
                    @endif
                    @if(isset($next))
                        <div class="pull-right">
                            <a style="float: right;" href="{{$next->slug}}">Selanjutnya &rarr;</a>
                        </div>
                    @else
                        <div class="pull-right"></div>
                    @endif
                    </div>
                    <hr>
                    <div>
                        {{$fbscript}}
                        {{fbcommentbox(blog_url($detailblog), '100%', '5', 'light')}}
                    </div>
                </section>
            </div>
        </div> <!--.center_column-->
    </div><!--.inner-column-->
</div>