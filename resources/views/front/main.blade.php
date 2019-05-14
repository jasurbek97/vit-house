<!DOCTYPE html>
<html lang="">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title>Document</title>

	<link rel="stylesheet" href="/vendor/front/css/style.css">
	<link rel="stylesheet" href="/vendor/front/css/media.css">
	<link rel="stylesheet" href="/vendor/front/css/fonts.css">
	<link rel="stylesheet" href="/vendor/front/libs/swiper-slider/swiper.min.css">
	<link rel="stylesheet" href="/vendor/front/libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400|Prata&amp;subset=cyrillic" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
{{--	<link rel="stylesheet" href="/vendor/front/libs/touch-sideswipe-master/touch-sideswipe.min.css">--}}
	<link rel="shortcut icon" href="/vendor/front/images/favicon.png" type="image/x-icon">


</head>
<body>



<div class="preloader" id="page-preloader">
	<div id="cube-loader">
		<div class="caption">
			<div class="cube-loader">
				<div class="cube loader-1"></div>
				<div class="cube loader-2"></div>
				<div class="cube loader-4"></div>
				<div class="cube loader-3"></div>
			</div>
		</div>
	</div>

</div>

📓<a class="popup_message" id="popup_message" data-toggle="modal" data-target="#message" href="#"></a>
<div class="modal fade" id="message" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="alert alert-info alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-info"></i> Alert!</h4>
				<strong>{{ session('message') }}</strong>,<br>
			</div>
		</div>
	</div>
</div>


<div class="main-content-wrapper">
	<section>

		<nav class="main-nav">

			<div class="menu-toggle">
				<div class="menu-icon">
					<span class="menu-icon__line menu-icon__line-left"></span>
					<span class="menu-icon__line"></span>
					<span class="menu-icon__line menu-icon__line-right"></span>
				</div>
			</div>

			<div class="nav">
				<div class="nav__content">
					<ul class="nav__list montserrat">
						<li class="nav__list-item">Главная</li>
						<li class="nav__list-item">О нас</li>
						<li class="nav__list-item">Проекты</li>
						<li class="nav__list-item" data-toggle="modal" data-target="#exampleModalCenter2">Контакты</li>
					</ul>
				</div>
			</div> <!-- nav -->


			<div class="container-fluid d-flex myalign-items-end h-100">
				<div class="col-md-9 d-flex myalign-items-end">
					<div class="logo">
						<a href="#"><img src="/vendor/front/images/logo.png" class="" alt=""></a>
					</div>

					<div class="myw-100 d-flex justify-content-end">
						<a href="tel: 712004044" class="header-phone montserrat">998 71 200 40 44</a>
					</div>
				</div>


			</div> <!-- container-fluid -->


		</nav> <!-- main-nav -->

		<!-- Swiper -->
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide res-dnone" style="background-image: url(vendor/front/images/slide1-texture.png);">
					<div class="container-fluid p-0 h-100 position-relative">
						<div class="d-flex align-items-center myclass1">
							<div class="header-line"></div>
							<p class="main-color mb-0">new dimensions</p>

						</div>
						<div class="row h-100 myrow position-relative">

							<div class="col-md-12 h100vh position-relative">
								@php($c = 1)
								@foreach($cats as $cat)
									<div data-relative-input="true" id="scene{{ $c++ }}" class="position-relative">

										<a href="{{$cat->slug}}" data-depth="0.8" class="myblock" style="background: url({{$cat->image}})!important;" >

										</a>
										<a href="{{$cat->slug}}" data-depth="1.2" class="block-text">{!! $cat->name !!}</a>
									</div>
								@endforeach
						</div> <!-- row -->

					</div> <!-- container-fluid -->
				</div> <!-- swiper-slider -->






				<div class="swiper-slide res-dblock py-5" style="background-image: url(vendor/front/images/slide1-texture.png);">

					<div class="container pt-5 position-relative">
						<div class="d-flex align-items-center myclass1">
							<div class="header-line"></div>
							<p class="main-color mb-0">new dimensions</p>

						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="res-card" style="background: url(vendor/front/images/card-1.png) no-repeat center; background-size: 100%;">
									<h4>Окна из <br> дерева</h4>
								</div>


								<div class="res-card even-res-card" style="background: url(vendor/front/images/card-2.png) no-repeat center; background-size: 100%;">
									<h4>Мебель</h4>
								</div>


								<div class="res-card" style="background-color: #000000ad!important;
									background-image: url(vendor/front/images/card-3.png)!important;
									background-size: cover!important;abort('400')
									background-blend-mode: multiply!important;">
									<h4>Зимние  <br> сады</h4>
								</div>


								<div class="res-card even-res-card" style="background: url(vendor/front/images/card-4.png) no-repeat center; background-size: 100%;">
									<h4>The Black</h4>
								</div>
							</div> <!-- col-md-12 -->
						</div> <!-- row -->
					</div> <!-- container -->

				</div> <!-- swiper-slider -->


			</div> <!-- swiper-wrapper -->
			<!-- Add Pagination -->


		</div> <!-- swiper-container -->
		</div>
	</section>



</div>






<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<button type="button" class="close myclose" data-dismiss="modal" aria-label="Close">
				<img src="/vendor/front/images/close.png" class="img-width" alt="">
			</button>
			<div class="modal-body">
				<div class="w-100 h-100 modal-form">
					<h2>Форма заказа</h2>
					<p>	Оставьте свои контактные данные и наш
						менеджер свяжится с вами в ближайшее время</p>

					<form action="{{route('o.store')}}" method="POST" class="main-form">
						<div class="d-flex montserrat mydiv2">
							@csrf
							<input type="hidden" id="product_id" name="id" value="">
							<input type="text" name="name" maxlength="50" minlength="3" required  placeholder="Ваше имя">
							<input type="text" name="number" maxlength="13" minlength="7" required  placeholder="Номер телефона">
						</div>
						<div class="mr-auto ml-auto">
							<button type="submit" class="mybtn" >заказать</button>
						</div>

					</form>
				</div>

			</div> <!-- modal-form -->
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
	<div class="modal-dialog justify-content-end modal-dialog-centered" role="document">
		<div class="modal-content myw-50">
			<button type="button" class="close myclose" data-dismiss="modal" aria-label="Close">
				<img src="/vendor/front/images/close.png" class="img-width" alt="">
			</button>
			<div class="modal-body p-0 m-0">
				<div class="w-100 h-100">

					<div class="contact-info">
						<div class="w-100 myflex pb-50px">
							<div class="w-50 p-0">
								<p class="mb-0 montserrat">Телефон</p>
								<a href="tel: 712004044">998 71 200 40 44</a>
							</div> <!-- col-md-6 -->

							<div class="w-50 p-0">
								<p class="mb-0 montserrat">Эл. почта</p>
								<a href="mailto: hello@vithouse.uz">hello@vithouse.uz</a>
							</div> <!-- col-md-6 -->
						</div>


						<div class="w-100 p-0">
							<p class="mb-0 montserrat">Адрес</p>
							<a href="#" onclick="return false">100000, Узбекистан, Ташкент,
								ул. Миркаримова, дом 30</a>
						</div> <!-- col-md-6 -->
					</div> <!-- contact-info -->

					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2995.0430633228725!2d69.28367501479566!3d41.351417706188236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8cac9de6a4bf%3A0x9055c10524e8f4dd!2sOltin+joja+restaurant+shahriston!5e0!3m2!1sru!2s!4v1556106355674!5m2!1sru!2s" width="100%" height="40%" frameborder="0" style="border:0" class="mymap" allowfullscreen></iframe>
				</div>

			</div> <!-- modal-form -->
		</div>
	</div>
</div>



<script src="/vendor/front/js/jquery.js"></script>
<script src="/vendor/front/libs/bootstrap/js/bootstrap.min.js"></script>
<script src="/vendor/front/libs/bootstrap/js/popper.min.js"></script>
<script src="/vendor/front/js/jquery.stickystack.min.js"></script>
<script src="/vendor/front/js/parallax.min.js"></script>

<script src="/vendor/front/js/smoothscroll.min.js"></script>
<script src="/vendor/front/libs/swiper-slider/swiper.min.js"></script>
{{--<script src="/vendor/front/libs/touch-sideswipe-master/touch-sideswipe.min.js"></script>--}}
<script>
    $(".button_order").on('click', function(){
        var id = $(this).data('id');
        $("#product_id").val(id);
    });
</script>
<script src="/vendor/front/js/main.js"></script>
<?php
if(session('message'))
{
	echo '<script>
            document.getElementById("popup_message").click();
        </script>';
}
?>
</body>
</html>