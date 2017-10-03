<div class="container">
	<div class="breadcrumb"><p>Register</p></div>
	<div class="inner-column row">
		<div class="col-lg-3 col-xs-12 col-sm-4 pull-right">
		</div>
		<div id="center_column" class="col-lg-7 col-xs-12 col-sm-8">
			{{Form::open(array('url'=>'member','method'=>'post','class'=>'form-horizontal'))}}
				<div class="form-group">
					<label class="col-lg-2">Nama</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="nama" value="{{Input::old('nama')}}" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2">Email</label>
					<div class="col-lg-10">
						<input type="email" class="form-control" name="email" value="{{Input::old('email')}}" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2">Password</label>
					<div class="col-lg-10">
						<input type="password" class="form-control" name="password" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2">Konfirmasi Password</label>
					<div class="col-lg-10">
						<input type="password" class="form-control" name="password_confirmation" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2">Negara</label>
					<div class="col-lg-10">
						{{Form::select('negara',array('' => '-- Pilih Negara --') + $negara, Input::old('negara'), array('required', "id"=>"negara", "data-rel"=>"chosen", "class"=>"form-control"))}}
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2">Provinsi</label>
					<div class="col-lg-10">
						{{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi, Input::old("provinsi"), array('required', "id"=>"provinsi", "data-rel"=>"chosen", "class"=>"form-control"))}}
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2">Kota</label>
					<div class="col-lg-10">
						{{Form::select('kota',array('' => '-- Pilih Kota --') + $kota, Input::old("kota"), array('required', "id"=>"kota", "data-rel"=>"chosen", "class"=>"form-control"))}}
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2">Alamat</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="3" name="alamat" required>{{Input::old("alamat")}}</textarea>
					</div>
				</div> 
				<div class="form-group">
					<label class="col-lg-2">Kode Pos</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="kodepos" value="{{Input::old('kodepos')}}" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2">Telepon</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="telp" value="{{Input::old('telp')}}" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2">Captcha</label>
					<div class="col-lg-10 form-inline">
						<div class="row">
							<div class="col-xs-12 col-sm-4 col-lg-3">
								{{ HTML::image(Captcha::img(), 'Captcha image') }}
							</div>
							<div class="col-xs-12 col-sm-8 col-lg-9">
								{{Form::text('captcha','',array('class'=>'form-control'))}}
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
						<div class="checkbox">
							<label>
								<input name="readme" value="1" type="checkbox" checked> Saya telah membaca dan menyetujui <a href="{{URL::to('service')}}" target="_blank">Privacy Policy</a>
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
						<button class="btn btn-success" type="submit">Register</button>
						<button class="btn btn-default" type="reset">Reset</button>
					</div>
				</div>
			{{Form::close()}}
		</div>
	</div>
</div>