<div class="container">
	<div class="inner-column row">
        <div id="left_sidebar" class="col-xs-12 col-md-3 col-lg-3">
            @foreach(vertical_banner() as $banner)
            <div id="advertising">
            	<div class="img-block">
            		<a href="{{url($banner->url)}}">
            			{{HTML::image(banner_image_url($banner->gambar),'Info Promo',array('width'=>'272','height'=>'auto','class'=>'img-responsive'))}}
        			</a>
                </div>
            </div>
            @endforeach
        </div>
        <div id="center_column" class="col-xs-12 col-md-5 col-lg-5">
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
	    <div class="col-xs-12 col-md-4 col-lg-4">
    		<h2>Pelanggan Baru</h2>
	    	<p>Nikmati kemudahan dalam berbelanja dengan daftar menjadi member di toko kami.</p>
	    	<br>
	    	<a class="btn btn-info" href="{{url('member/create')}}">Register</a>
	    </div>
    </div>
</div>