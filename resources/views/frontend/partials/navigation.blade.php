<nav class="navbar square-borders navigation-bar" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				
				@foreach($categories as $category)

					<li class="@if($category->children()->exists()) dropdown @endif @if($category->useMega()) mega @endif" >
						
						@if($category->children()->exists())
							<a href="{{ route('site.category', $category->slug) }}" class="dropdown-toggle" data-toggle="dropdown">{{ $category->name }} <b class="caret"></b></a>
							
							@if($category->useMega())
								<ul class="dropdown-menu row">
									
									@foreach($category->children as $child)
										<li class="col-md-{{ (12/$category->children->count()) < 2 ? 2 : 12/$category->children->count() }}">
											<ul>
								                <li class="dropdown-header">{{$child->name}}</li>
								                @foreach($child->children as $subChild)
													<li><a href="{{ route('site.category', $subChild->slug) }}">{{$subChild->name}}</a></li>
								                @endforeach
								              </ul>
										</li>
									@endforeach
									
								</ul>
							@else
								<ul class="dropdown-menu">
									@foreach($category->children as $child)
										<li><a href="{{ route('site.category', $child->slug) }}">{{$child->name}}</a></li>
									@endforeach
								</ul>
							@endif

						@else
							<a href="{{ route('site.category', $child->slug) }}">{{ $category->name }}</a>
						@endif {{-- end of has children --}}

					</li>
				@endforeach {{-- end of categories loop  --}}

				<li class="dropdown mega hidden">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Mega menu <b class="caret"></b></a>
					<ul class="dropdown-menu row">
						<li class="col-md-2">
							<ul>
				                <li class="dropdown-header">Dresses</li>
				                <li><a href="#">Unique Features</a></li>
				                <li><a href="#">Image Responsive</a></li>
				                <li><a href="#">Auto Carousel</a></li>
				                <li><a href="#">Newsletter Form</a></li>
				                <li><a href="#">Four columns</a></li>
				                <li class="divider"></li>
				                <li class="dropdown-header">Tops</li>
				                <li><a href="#">Good Typography</a></li>
				              </ul>
						</li>
						<li class="col-md-2">
							<ul>
				                <li class="dropdown-header">Dresses</li>
				                <li><a href="#">Unique Features</a></li>
				                <li><a href="#">Image Responsive</a></li>
				                <li><a href="#">Auto Carousel</a></li>
				                <li><a href="#">Newsletter Form</a></li>
				                <li><a href="#">Four columns</a></li>
				                <li class="divider"></li>
				                <li class="dropdown-header">Tops</li>
				                <li><a href="#">Good Typography</a></li>
				              </ul>
						</li>
						<li class="col-md-2">
							<ul>
				                <li class="dropdown-header">Dresses</li>
				                <li><a href="#">Unique Features</a></li>
				                <li><a href="#">Image Responsive</a></li>
				                <li><a href="#">Auto Carousel</a></li>
				                <li><a href="#">Newsletter Form</a></li>
				                <li><a href="#">Four columns</a></li>
				                <li class="divider"></li>
				                <li class="dropdown-header">Tops</li>
				                <li><a href="#">Good Typography</a></li>
				              </ul>
						</li>
						<li class="col-md-2">
							<ul>
				                <li class="dropdown-header">Dresses</li>
				                <li><a href="#">Unique Features</a></li>
				                <li><a href="#">Image Responsive</a></li>
				                <li><a href="#">Auto Carousel</a></li>
				                <li><a href="#">Newsletter Form</a></li>
				                <li><a href="#">Four columns</a></li>
				                <li class="divider"></li>
				                <li class="dropdown-header">Tops</li>
				                <li><a href="#">Good Typography</a></li>
				              </ul>
						</li>
						<li class="col-md-2">
							<ul>
				                <li class="dropdown-header">Dresses</li>
				                <li><a href="#">Unique Features</a></li>
				                <li><a href="#">Image Responsive</a></li>
				                <li><a href="#">Auto Carousel</a></li>
				                <li><a href="#">Newsletter Form</a></li>
				                <li><a href="#">Four columns</a></li>
				                <li class="divider"></li>
				                <li class="dropdown-header">Tops</li>
				                <li><a href="#">Good Typography</a></li>
				              </ul>
						</li>
						<li class="col-md-2">
							<ul>
				                <li class="dropdown-header">Dresses</li>
				                <li><a href="#">Unique Features</a></li>
				                <li><a href="#">Image Responsive</a></li>
				                <li><a href="#">Auto Carousel</a></li>
				                <li><a href="#">Newsletter Form</a></li>
				                <li><a href="#">Four columns</a></li>
				                <li class="divider"></li>
				                <li class="dropdown-header">Tops</li>
				                <li><a href="#">Good Typography</a></li>
				              </ul>
						</li>
						
					</ul>
				</li>

				<li class="dropdown hidden ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li><a href="#">Separated link</a></li>
					</ul>
				</li>
				
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>{{-- / .navigation-bar --}}