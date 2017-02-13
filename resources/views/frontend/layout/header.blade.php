<header>

	<div class="container-fluide top-bar">
		<div class="container">
			<nav class="navbar" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".top-bar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<span class="navbar-text">Support 24/7 : 03000287523</span>
				</div>
		
				<div class="collapse navbar-collapse top-bar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">My Account</a></li>
						<li><a href="#">Wishlist</a></li>
						<li><a href="#">Checkout</a></li>
						<li><a href="#">Cart</a></li>
						<li><a href="#">Track my order</a></li>
						<li><a href="#">Help</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>
		</div>
	</div>{{-- / .top-bar --}}

	<div class="container header_middle">
		<div class="row">
			<div class="col-sm-3 col-md-3">
				<div class="logo"><a href="{{ url('/') }}">{{ Html::image('images/logo.png') }}</a></div>
			</div>

			<div class="col-sm-6 col-md-6">
				<div class="input-group header-search">
					<input type="text" class="form-control" id="exampleInputAmount" placeholder="Search">
					<span class="input-group-btn">
						<button type="button" class="btn btn-default">Go!</button>
					</span>
				</div>
			</div>

			<div class="col-sm-3 col-md-3">
				<div class="cart-widget navbar-right clearfix">
					<a href="#" class="btn CTA-cart btn-default square-borders">30 Items - PKR 1500/-</a>
					<div class="cart-list">
						<ul>
							<li class="row">
								<div class="image">
									<img src="http://placehold.it/50" class="img-responsive">
									<a href="#" title="Remove this item from cart"><i class="fa fa-trash-o"></i></a>
								</div>
								<div class="detail"><a href="#">Sample name of large product</a> <br> <small>1 x PKR 150</small></div>
							</li>
							<li class="row">
								<div class="image">
									<img src="http://placehold.it/50" class="img-responsive">
									<a href="#" title="Remove this item from cart"><i class="fa fa-trash-o"></i></a>
								</div>
								<div class="detail"><a href="#">Sample name of large product</a> <br> <small>1 x PKR 150</small></div>
							</li>
							<li class="row">
								<div class="image">
									<img src="http://placehold.it/50" class="img-responsive">
									<a href="#" title="Remove this item from cart"><i class="fa fa-trash-o"></i></a>
								</div>
								<div class="detail"><a href="#">Sample name of large product</a> <br> <small>1 x PKR 150</small></div>
							</li>
							<li class="row">
								<div class="image">
									<img src="http://placehold.it/50" class="img-responsive">
									<a href="#" title="Remove this item from cart"><i class="fa fa-trash-o"></i></a>
								</div>
								<div class="detail"><a href="#">Sample name of large product</a> <br> <small>1 x PKR 150</small></div>
							</li>
							<li class="row">
								<div class="image">
									<img src="http://placehold.it/50" class="img-responsive">
									<a href="#" title="Remove this item from cart"><i class="fa fa-trash-o"></i></a>
								</div>
								<div class="detail"><a href="#">Sample name of large product</a> <br> <small>1 x PKR 150</small></div>
							</li>
						</ul>
						<div class="row cart-options">
							<div class="col-md-6"><a href="#" class="btn square-borders">Goto Cart</a></div>
							<div class="col-md-6"><a href="#" class="btn square-borders">Checkout</a></div>
						</div>
					</div>
				</div>{{-- / .cart-widget --}}
			</div>
		</div>
	</div>{{-- / .header_middle --}}

	{{-- @include('frontend.partials.navigation') --}}
	@cache('frontend.partials.navigation', null, config('partialcache.expiry'))
	

</header>