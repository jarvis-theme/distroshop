<div class="container">
    <div class="breadcrumb"><p>Hubungi Kami</p></div>
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
                        @foreach(best_seller() as $bestproduk)
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
                    <div class="btn-more"><a href="{{url('koleksi/best-seller')}}">Lihat Semua</a></div>
                </div>
                @endif
                @if(recentBlog(null, 2)->count() > 0)
                <div id="latest-news" class="block">
                    <div class="title"><h2>Artikel Terbaru</h2></div>
                    <ul class="block-content">
                        @foreach(recentBlog(null, 2) as $blogs)
                        <li>
                            <h5 class="title-news">{{$blogs->judul}}</h5>
                            <p>{{short_description($blogs->isi, 150)}}<a class="read-more" href="{{blog_url($blogs)}}">Selengkapnya</a></p>
                            <span class="date-post">{{date("F d, Y", strtotime($blogs->created_at))}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
                <div class="maps" id="map">
                    @if($kontak->lat!='0' || $kontak->lng!='0')
                    <iframe id="map-frame" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="//maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->lat.','.$kontak->lng }}&amp;aq=&amp;sll={{ $kontak->lat.','.$kontak->lng }}&amp;sspn={{ $kontak->lat.','.$kontak->lng }}&amp;ie=UTF8&amp;t=m&amp;z=14&amp;output=embed"></iframe><br />
                    @else
                    <iframe id="map-frame" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="//maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{str_replace(' ','+',$kontak->alamat)}}&amp;aq=0&amp;oq={{str_replace(' ','+',$kontak->alamat)}}&amp;sspn={{ $kontak->lat.','.$kontak->lng }}&amp;ie=UTF8&amp;hq=&amp;hnear={{str_replace(' ','+',$kontak->alamat)}}&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br />
                    @endif
                </div>
                <div class="contact-us" >
                    <br>
                    <div class="contact-desc">
                        @if(!empty($kontak->alamat))
                        <strong>Alamat Toko :</strong> {{$kontak->alamat}}<br>
                        @endif
                        @if(!empty($kontak->telepon))
                        <strong>Telp :</strong> {{$kontak->telepon}}<br>
                        @endif
                        @if(!empty($kontak->hp))
                        <strong>HP :</strong> {{$kontak->hp}}<br>
                        @endif
                        @if(!empty($kontak->bb))
                        <strong>BBM :</strong> {{$kontak->bb}}<br>
                        @endif
                        @if(!empty($kontak->email))
                        <strong>Email :</strong> <a href="{{$kontak->email}}">{{$kontak->email}}</a>
                        @endif
                        <div class="clr"></div>
                    </div>
                    <br><br>
                    <form class="contact-form" action="{{url('kontak')}}" method="post">
                        <p class="form-group">
                            <input class="form-control" placeholder="Nama" name="namaKontak" type="text" required>
                        </p>
                        <p class="form-group">
                            <input class="form-control" placeholder="Email" name="emailKontak" type="text" required>
                        </p>
                        <p class="form-group">
                            <textarea class="form-control" placeholder="Pesan" name="messageKontak" required></textarea>
                        </p>
                        <button class="btn btn-info" type="submit">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>