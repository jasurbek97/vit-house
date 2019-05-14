document.body.onload = function() {

	setTimeout(function() {
		var preloader = document.getElementById('page-preloader');
		if( !preloader.classList.contains('done') ) {
			preloader.classList.add('done');
		};
	}, 2000);

};


console.clear();

const app = (() => {
	let body;
	let menu;
	let menuItems;
	
	const init = () => {
		body = document.querySelector('body');
		menu = document.querySelector('.menu-toggle');
		menuItems = document.querySelectorAll('.nav__list-item');

		applyListeners();
	}
	
	const applyListeners = () => {
		menu.addEventListener('click', () => toggleClass(body, 'nav-active'));
	}
	
	const toggleClass = (element, stringClass) => {
		if(element.classList.contains(stringClass))
			element.classList.remove(stringClass);
		else
			element.classList.add(stringClass);
	}
	
	init();
})();

$( () => {
	
	//On Scroll Functionality
	$(window).scroll( () => {
		var windowTop = $(window).scrollTop();
		//windowTop > 30 ? $('.main-nav').addClass('navShadow') : $('.main-nav').removeClass('navShadow');
		//windowTop > 30 ? $('.menu-toggle').addClass('after-toggle') : $('.menu-toggle').removeClass('after-toggle');
	});



	
	//Click Logo To Scroll To Top
	$('#logo').on('click', () => {
		$('html,body').animate({
			scrollTop: 0
		},500);
	});
	
	//Smooth Scrolling Using Navigation Menu
	$('a[href*="#"]').on('click', function(e){
		$('html,body').animate({
			scrollTop: $($(this).attr('href')).offset().top - 100
		},1000);
		e.preventDefault();
	});
	
	
});

var swiper = new Swiper('.bottom-slider', {
	slidesPerView: 4,
	spaceBetween: 20,
	pagination: {
		el: '.swiper-pagination',
		clickable: true,
	},
	breakpoints: {
        1024: {
          slidesPerView: 3,
          spaceBetween: 40,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
        640: {
          slidesPerView: 1.5,
          spaceBetween: 20,
        },
        320: {
          slidesPerView: 1,
          spaceBetween: 10,
        }
      },
      navigation: {
        nextEl: '.my2-button-next',
        prevEl: '.my2-button-prev',
      },


});
var swiper = new Swiper('.main-slider', {
	spaceBetween: 30,
	effect: 'fade',
	navigation: {
		nextEl: '.my-button-next',
		prevEl: '.my-button-prev',
	},
	pagination: {
		el: '.myswiper-pagination',
		type: 'fraction',
	},


});
$('.swiper-container').on('changed.swiper.container', function(event) {
	$('.slide-title').addClass('animated fadeInDown');
	setTimeout(function() { $('.slide-title').addClass('animated fadeInDown'); }, 0);
});

$('.main-content-wrapper').stickyStack({
	containerElement: '.main-content-wrapper',
	stackingElement: 'section',
});


var scene = document.getElementById('scene1');
var parallaxInstance = new Parallax(scene, {
	relativeInput: true,
	scalarX: false,
});

var scene = document.getElementById('scene2');
var parallaxInstance = new Parallax(scene, {
	relativeInput: true,
	scalarX: false,
});

var scene = document.getElementById('scene3');
var parallaxInstance = new Parallax(scene, {
	relativeInput: true,
	scalarX: false,
});

var scene = document.getElementById('scene4');
var parallaxInstance = new Parallax(scene, {
	relativeInput: true,
	scalarX: false,
});

