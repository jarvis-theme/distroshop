<div class="container">
    <div class="inner-column row">
        <div class="col-xs-12 col-md-3 col-lg-3">
            <ul class="sidebanner">
                @foreach(vertical_banner() as $banner)
                <li>
                    <a href="{{url($banner->url)}}">
                        {{HTML::image(banner_image_url($banner->gambar),'Info Promo',array('class'=>'img-responsive'))}}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-xs-12 col-md-5 col-lg-5 fcenter">
            <div class="contact-us">
                <h2 class="title">Konfirmasi Order</h2>
                {{Form::open(array('url'=>'konfirmasiorder','method'=>'post','class'=>'form-inline'))}}
                    <div class="input-group col-lg-12">
                        <input class="form-control" placeholder="Kode Order" type="text" name="kodeorder" required>
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="submit">Cari Kode</button>
                        </span>
                    </div>
                {{Form::close()}}
                <br>
            </div>
            <br>
        </div>
        <div class="col-xs-12 col-md-4 col-lg-4 fcenter">
            <h2 class="title">Pelanggan Baru</h2>
            <p>Nikmati kemudahan dalam berbelanja dengan daftar menjadi member di toko kami.</p>
            <a class="btn btn-info" href="{{url('member/create')}}">Register</a>
        </div>
    </div>
</div>