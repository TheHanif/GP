<hr>
<footer>
	<div class="container">
		This is footer
	</div>{{-- / .container --}}

	<div class="container socialized">
		<div class="col-md-6">
			<form action="" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<div class="col-sm-3"><label for="newsletter" class="label-input">NEWSLETTER</label></div>
					<div class="col-sm-9">
						<div class="input-group header-search">
							<input type="email" class="form-control square-borders" id="newsletter" placeholder="Subscribe for our newsletter">
							<span class="input-group-btn">
								<button type="button" class="btn btn-default square-borders">Go!</button>
							</span>
						</div>
					</div>
				</div>
			</form>

		</div>
		<div class="col-md-6">
			<ul>
				<li><p>KEEP IN TOUCH</p></li>
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
			</ul>
		</div>
	</div>{{-- / .socialized --}}

	<div class="container-fluide footer-copy">
		<div class="container">
			<div class="row">
				<div class="col-md-6"><p>Copyright &copy; {{date('Y')}} <strong>{{config('app.name')}}</strong> All Rights Reserved.</p></div>
				<div class="col-md-6"><p>PAYMENT METHODS : COD & Credid/Debit Cards</p></div>
			</div>
		</div>
	</div>{{-- / .footer-copy --}}
</footer>