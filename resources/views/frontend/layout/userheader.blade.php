<!DOCTYPE html>
<html lang="">

<head>

	<meta charset="utf-8">
	<title>OptimizedHTML 5</title>
	<meta name="description" content="Startup HTML template OptimizedHTML 5">
	<meta name="viewport" content="width=device-width">
	<link rel="icon" href="img/favicon.png">
	<meta property="og:image" content="img/dest/preview.jpg">
  @include('frontend.layout.css')
     @yield('css')
</head>

<body>

	<!-- CUSTOM HTML -->
<header class="header header-wrap">
		<div class="header-row">
			<div class="header-logo">
			  <a href=""><img  src="{{asset('/frontend/images/src/logo-text.svg')}}" alt=""></a>
		</div>
		<div class="header-nav-center">
			<div class="header-nav-form">
				<form class="form-inline header-form-search my-2 my-lg-0">
					<input class="form-control mr-sm-2" placeholder="#Лота, VIN или марка автомобиля">
					<button class="btn" type="submit"><img src="{{asset('/frontend/images/icon-new/search.svg')}}" alt=""></button>
				</form>
			</div>
			<div class="header-nav-link">
				<ul>
					<li><a href="">Поиск</a></li>
					<li><a href="">Проверить VIN</a></li>
					<li><a href="">Автомобили</a></li>
				</ul>
			</div>
		</div>
			<div class="header-nav-right">

				
				<div class="dropdown btn-lang">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"  data-toggle="dropdown" aria-haspopup="true">
							EN<span class="arrow-icon"></span>
						</a>

						<div class="dropdown-menu dropdown-menu-lang" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="/">RU</a>
							<a class="dropdown-item" href="/">SPA</a>
						</div>
				</div>
			</div>
		</div>
	</header>


	@yield('content')

@include('frontend.layout.footer')
@include("frontend.layout.js")
@yield('js')

</body>
</html>
