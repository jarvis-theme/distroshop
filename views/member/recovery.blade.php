<div class="container">
	<div class="inner-column row">
		<div id="center_column" class="col-lg-9 col-xs-12">
			<p>Kamu bisa menggati password lama kamu dengan yang baru melalui halaman ini.</p>
			<br>
			<h2>Reset Password</h2>
			<hr><br>
			<form class="form-horizontal" action="{{url('member/recovery/'.$id.'/'.$code)}}" method="post">
				<div class="form-group">
					<label class="col-sm-2">Password</label>
					<div class="col-sm-4">
						<input type="password" class="form-control" name="password" placeholder="Password" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2">Konfirmasi password</label>
					<div class="col-sm-4">
						<input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi password" required>
					</div>
				</div>
				<div class="form-group">
					<div class="pull-left col-sm-2">
						<button class="btn btn-success" type="submit">Reset</button>
					</div>
					<div class="pull-right col-sm-4">
						<small>Belum punya akun?</small>
						<a href="{{url('member/create')}}" class="btn btn-info">Daftar Baru</a>
					</div>
				</div>
			</form>
			<br>
		</div>
		<div class="col-lg-3 col-xs-12">
			@foreach(vertical_banner() as $banners)
			<div id="adv-sidebar">
				{{HTML::image(banner_image_url($banners->gambar), 'Info Promo')}}
			</div>
			@endforeach
		</div>
	</div>
</div>