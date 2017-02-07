<header>
	
	<div class="container-fluide top-bar">
		<div class="container">
			<nav class="navbar" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<span class="navbar-text">Support 24/7 : 03000287523</span>
				</div>
		
				<div class="collapse navbar-collapse navbar-ex1-collapse">
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
			<div class="col-md-3">
				<div class="logo"><a href="{{ url('/') }}">{{ Html::image('images/logo.png') }}</a></div>
			</div>

			<div class="col-md-6">Search bar</div>

			<div class="col-md-3">
				<div class="cart-widget navbar-right">
					<div class="btn-group">
						<a href="#" class="btn CTA-cart btn-default">3 Items - PKR 1500/-</a>
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="caret"></span>
							<span class="sr-only">Toggle Dropdown</span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Separated link</a></li>
						</ul>
					</div>
				</div>{{-- / .cart-widget --}}
			</div>
		</div>
	</div>{{-- / .header_middle --}}


</header>