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
						<li class="dropdown" ><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> My Account</a>
							<ul class="dropdown-menu">
								<li><a href="#">My Orders</a></li>
								<li><a href="#">Edit Profile</a></li>
								<li><a href="#">Change password</a></li>
							</ul>
						</li>
						<li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
						<li><a href="#"><i class="fa fa-money"></i> Checkout</a></li>
						<li><a href="#"><i class="fa fa-shopping-cart"></i> Cart</a></li>
						<li><a href="#"><i class="fa fa-search"></i> Track my order</a></li>
						<li><a href="#"><i class="fa fa-book"></i> Help</a></li>
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
					<input type="text" class="form-control square-borders" id="exampleInputAmount" placeholder="Search">
					<span class="input-group-btn">
						<button type="button" class="btn btn-theme btn-default square-borders"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</div>

			<div class="col-sm-3 col-md-3">
				<div class="cart-widget navbar-right clearfix">
					<a href="#" class="btn CTA-cart btn-default square-borders">@{{ totalItems }} Items - PKR @{{ cartAmount }}/-</a>

					<div class="cart-list">
						<cart-list :cart="cart"></cart-list>
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