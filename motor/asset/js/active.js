/* =====================================
Template Name: Eshop
Author Name: Naimur Rahman
Author URI: http://www.wpthemesgrid.com/
Description: Eshop - eCommerce HTML5 Template.
Version:1.0
========================================*/
/*=======================================
[Start Activation Code]
=========================================
	01. Mobile Menu JS
	02. Sticky Header JS
	03. Search JS
	04. Slider Range JS
	05. Home Slider JS
	06. Popular Slider JS
	07. Quick View Slider JS
	08. Home Slider 4 JS
	09. CountDown
	10. Flex Slider JS
	11. Cart Plus Minus Button
	12. Checkbox JS
	13. Extra Scroll JS
	14. Product page Quantity Counter
	15. Video Popup JS
	16. Scroll UP JS
	17. Nice Select JS
	18. Others JS
	19. Preloader JS
=========================================
[End Activation Code]
=========================================*/
(function($) {
    "use strict";
     $(document).on('ready', function() {

		/*====================================
			Mobile Menu
		======================================*/
		$('.menu').slicknav({
			prependTo:".mobile-nav",
			duration:300,
			animateIn: 'fadeIn',
			animateOut: 'fadeOut',
			closeOnClick:true,
		});

		/*====================================
		03. Sticky Header JS
		======================================*/
		jQuery(window).on('scroll', function() {
			if ($(this).scrollTop() > 200) {
				$('.header').addClass("sticky");
			} else {
				$('.header').removeClass("sticky");
			}
		});

		/*=======================
		  Search JS JS
		=========================*/
		$('.top-search a').on( "click", function(){
			$('.search-top').toggleClass('active');
		});

		/*=======================
		  Slider Range JS
		=========================*/
		$( function() {
			$( "#slider-range" ).slider({
			  range: true,
			  min: 0,
			  max: 500,
			  values: [ 120, 250 ],
			  slide: function( event, ui ) {
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			  }
			});
			$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
			  " - $" + $( "#slider-range" ).slider( "values", 1 ) );
		} );

		/*=======================
		  Home Slider JS
		=========================*/
		$('.home-slider').owlCarousel({
			items:1,
			autoplay:true,
			autoplayTimeout:5000,
			smartSpeed: 400,
			animateIn: 'fadeIn',
			animateOut: 'fadeOut',
			autoplayHoverPause:true,
			loop:true,
			nav:true,
			merge:true,
			dots:false,
			navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
			responsive:{
				0: {
					items:1,
				},
				300: {
					items:1,
				},
				480: {
					items:2,
				},
				768: {
					items:3,
				},
				1170: {
					items:4,
				},
			}
		});

		/*=======================
		  Popular Slider JS
		=========================*/
		$('.popular-slider').owlCarousel({
			items:1,
			autoplay:true,
			autoplayTimeout:5000,
			smartSpeed: 400,
			animateIn: 'fadeIn',
			animateOut: 'fadeOut',
			autoplayHoverPause:true,
			loop:true,
			nav:true,
			merge:true,
			dots:false,
			navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
			responsive:{
				0: {
					items:1,
				},
				300: {
					items:1,
				},
				480: {
					items:2,
				},
				768: {
					items:3,
				},
				1170: {
					items:4,
				},
			}
		});

		/*===========================
		  Quick View Slider JS
		=============================*/
		$('.quickview-slider-active').owlCarousel({
			items:1,
			autoplay:true,
			autoplayTimeout:5000,
			smartSpeed: 400,
			autoplayHoverPause:true,
			nav:true,
			loop:true,
			merge:true,
			dots:false,
			navText: ['<i class=" ti-arrow-left"></i>', '<i class=" ti-arrow-right"></i>'],
		});

		/*===========================
		  Home Slider 4 JS
		=============================*/
		$('.home-slider-4').owlCarousel({
			items:1,
			autoplay:true,
			autoplayTimeout:5000,
			smartSpeed: 400,
			autoplayHoverPause:true,
			nav:true,
			loop:true,
			merge:true,
			dots:false,
			navText: ['<i class=" ti-arrow-left"></i>', '<i class=" ti-arrow-right"></i>'],
		});

		/*====================================
		14. CountDown
		======================================*/
		$('[data-countdown]').each(function() {
			var $this = $(this),
				finalDate = $(this).data('countdown');
			$this.countdown(finalDate, function(event) {
				$this.html(event.strftime(
					'<div class="cdown"><span class="days"><strong>%-D</strong><p>Days.</p></span></div><div class="cdown"><span class="hour"><strong> %-H</strong><p>Hours.</p></span></div> <div class="cdown"><span class="minutes"><strong>%M</strong> <p>MINUTES.</p></span></div><div class="cdown"><span class="second"><strong> %S</strong><p>SECONDS.</p></span></div>'
				));
			});
		});

		/*====================================
		16. Flex Slider JS
		======================================*/
		(function($) {
			'use strict';
				$('.flexslider-thumbnails').flexslider({
					animation: "slide",
					controlNav: "thumbnails",
				});
		})(jQuery);

		/*====================================
		  Cart Plus Minus Button
		======================================*/
		var CartPlusMinus = $('.cart-plus-minus');
		CartPlusMinus.prepend('<div class="dec qtybutton">-</div>');
		CartPlusMinus.append('<div class="inc qtybutton">+</div>');
		$(".qtybutton").on("click", function() {
			var $button = $(this);
			var oldValue = $button.parent().find("input").val();
			if ($button.text() === "+") {
				var newVal = parseFloat(oldValue) + 1;
			} else {
				// Don't allow decrementing below zero
				if (oldValue > 0) {
					var newVal = parseFloat(oldValue) - 1;
				} else {
					newVal = 1;
				}
			}
			$button.parent().find("input").val(newVal);
		});

		/*=======================
		  Extra Scroll JS
		=========================*/
		$('.scroll').on("click", function (e) {
			var anchor = $(this);
				$('html, body').stop().animate({
					scrollTop: $(anchor.attr('href')).offset().top - 0
				}, 900);
			e.preventDefault();
		});

		/*===============================
		10. Checkbox JS
		=================================*/
		$('input[type="checkbox"]').change(function(){
			if($(this).is(':checked')){
				$(this).parent("label").addClass("checked");
			} else {
				$(this).parent("label").removeClass("checked");
			}
		});

		/*==================================
		 12. Product page Quantity Counter
		 ===================================*/
		$('.qty-box .quantity-right-plus').on('click', function () {
			var $qty = $('.qty-box .input-number');
			var currentVal = parseInt($qty.val(), 10);
			if (!isNaN(currentVal)) {
				$qty.val(currentVal + 1);
			}
		});
		$('.qty-box .quantity-left-minus').on('click', function () {
			var $qty = $('.qty-box .input-number');
			var currentVal = parseInt($qty.val(), 10);
			if (!isNaN(currentVal) && currentVal > 1) {
				$qty.val(currentVal - 1);
			}
		});

		/*=====================================
		15.  Video Popup JS
		======================================*/
		$('.video-popup').magnificPopup({
			type: 'iframe',
			removalDelay: 300,
			mainClass: 'mfp-fade'
		});

		/*====================================
			Scroll Up JS
		======================================*/
		$.scrollUp({
			scrollText: '<span><i class="fa fa-angle-up"></i></span>',
			easingType: 'easeInOutExpo',
			scrollSpeed: 900,
			animation: 'fade'
		});

	});

	/*====================================
	18. Nice Select JS
	======================================*/
	$('select').niceSelect();

	/*=====================================
	 Others JS
	======================================*/
	$( function() {
		$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 0, 500 ],
			slide: function( event, ui ) {
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			}
		});
		$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
		  " - $" + $( "#slider-range" ).slider( "values", 1 ) );
	} );

	/*=====================================
	  Preloader JS
	======================================*/
	//After 2s preloader is fadeOut
	$('.preloader').delay(1000).fadeOut('slow');
	setTimeout(function() {
	//After 2s, the no-scroll class of the body will be removed
	$('body').removeClass('no-scroll');
	}, 1000); //Here you can change preloader time

    TweenMax.set('#circlePath', {
        attr: {
          r: document.querySelector('#mainCircle').getAttribute('r')
        }
      })
      MorphSVGPlugin.convertToPath('#circlePath');

      var xmlns = "http://www.w3.org/2000/svg",
        xlinkns = "http://www.w3.org/1999/xlink",
        select = function(s) {
          return document.querySelector(s);
        },
        selectAll = function(s) {
          return document.querySelectorAll(s);
        },
        mainCircle = select('#mainCircle'),
        mainContainer = select('#mainContainer'),
        car = select('#car'),
        mainSVG = select('.mainSVG'),
        mainCircleRadius = Number(mainCircle.getAttribute('r')),
        //radius = mainCircleRadius,
        numDots = mainCircleRadius / 2,
        step = 360 / numDots,
        dotMin = 0,
        circlePath = select('#circlePath')

      //
      //mainSVG.appendChild(circlePath);
      TweenMax.set('svg', {
        visibility: 'visible'
      })
      TweenMax.set([car], {
        transformOrigin: '50% 50%'
      })
      TweenMax.set('#carRot', {
        transformOrigin: '0% 0%',
        rotation:30
      })

      var circleBezier = MorphSVGPlugin.pathDataToBezier(circlePath.getAttribute('d'), {
        offsetX: -20,
        offsetY: -5
      })



      //console.log(circlePath)
      var mainTl = new TimelineMax();

      function makeDots() {
        var d, angle, tl;
        for (var i = 0; i < numDots; i++) {

          d = select('#puff').cloneNode(true);
          mainContainer.appendChild(d);
          angle = step * i;
          TweenMax.set(d, {
            //attr: {
            x: (Math.cos(angle * Math.PI / 180) * mainCircleRadius) + 400,
            y: (Math.sin(angle * Math.PI / 180) * mainCircleRadius) + 300,
            rotation: Math.random() * 360,
            transformOrigin: '50% 50%'
              //}
          })

          tl = new TimelineMax({
            repeat: -1
          });
          tl
            .from(d, 0.2, {
              scale: 0,
              ease: Power4.easeIn
            })
            .to(d, 1.8, {
              scale: Math.random() + 2,
              alpha: 0,
              ease: Power4.easeOut
            })

          mainTl.add(tl, i / (numDots / tl.duration()))
        }
        var carTl = new TimelineMax({
          repeat: -1
        });
        carTl.to(car, tl.duration(), {
          bezier: {
            type: "cubic",
            values: circleBezier,
            autoRotate: true
          },
          ease: Linear.easeNone
        })
        mainTl.add(carTl, 0.05)
      }

      makeDots();
      mainTl.time(120);
      TweenMax.to(mainContainer, 20, {
        rotation: -360,
        svgOrigin: '400 300',
        repeat: -1,
        ease: Linear.easeNone
      });
      mainTl.timeScale(1.1)

})(jQuery);

