;
(function($) {

    "use strict";
    /*---------------------------------------------------
      * Initialize all widget js in elementor init hook
      ---------------------------------------------------*/
    $(window).on('elementor/frontend/init', function() {
        // Brand Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-brand-slider-widget.default', function($scope) {
            activeBrandSlider($scope);
        });
        // Gallery Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-image-gallery-widget.default', function($scope) {
            activeGallerySlider($scope);
        });
        // Case Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-service-single-item-widget.default', function($scope) {
            activePerformanceSliderOne($scope);
        });
        // Case Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-course-slider-one-widget.default', function($scope) {
            activePerformanceSliderOne($scope);
        });
        // Header Slider Three
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-header-slider-two-widget.default', function($scope) {
            activeHeaderSliderOne($scope);
        });
        // Service Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-service-slider-one-widget.default', function($scope) {
            activeServiceGridSliderOne($scope);
        });
        // Service Slider Four
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-service-slider-four-widget.default', function($scope) {
            activeServiceGridSliderOne($scope);
        });
        // Testimonial Slider one
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-testimonial-one-widget.default', function($scope) {
            activeTestimonialSliderOne($scope);
        });
        // Testimonial Slider two
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-testimonial-two-widget.default', function($scope) {
            activeTestimonialSliderOne($scope);
        });
        // Testimonial Slider three
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-testimonial-three-widget.default', function($scope) {
            activeTestimonialSliderOne($scope);
        });
        // Packages Slider one
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-packages-single-slider-widget.default', function($scope) {
            activeTestimonialSliderOne($scope);
        });
        // Packages Slider two
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-packages-single-slider-two-widget.default', function($scope) {
            activeTestimonialSliderOne($scope);
        });
        // Packages Slider one
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-training-single-slider-widget.default', function($scope) {
            activeTestimonialSliderOne($scope);
        });
        // Team Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-team-member-one-widget.default', function($scope) {
            activeTeamMemberSliderOne($scope);
        });
        // Team Slider Two
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-team-member-two-widget.default', function($scope) {
            activeTeamMemberSliderOne($scope);
        });
        // Blog Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-blog-one-widget.default', function($scope) {
            activeBlogGridSliderOne($scope);
        });
        // Blog Slider Two
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-blog-two-widget.default', function($scope) {
            activeBlogGridSliderOne($scope);
        });
        // Blog Slider Three
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-blog-three-widget.default', function($scope) {
            activeBlogGridSliderOne($scope);
        });
        /* Counter Up */
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-counterup-one-widget.default', function($scope) {
            counterupInit($scope.find('.count-num'));
        });
        elementorFrontend.hooks.addAction('frontend/element_ready/yotta-countdown-widget.default', function($scope) {
            countdownInit($scope.find('.mycountdown'));
        });

        // elementorFrontend.hooks.addAction('frontend/element_ready/yotta-tabs-one-widget.default', function($scope) {
        //     yottaTabs($scope);
        // });

    });


    $(window).on('elementor/frontend/init', function() {

        elementorFrontend.hooks.addAction('frontend/element_ready/global', function($scope, $) {
            progressBarInit();
        });

    });
    $("select").niceSelect(),
        /**-----------------------------
         *  countdown
         * ---------------------------*/
        function countdownInit($scope) {
            var countdownTime = $scope.data('countdown');
            $scope.countdown(countdownTime, function(event) {
                $('.month').text(
                    event.strftime('%m')
                );
                $('.days').text(
                    event.strftime('%n')
                );
                $('.hours').text(
                    event.strftime('%H')
                );
                $('.mins').text(
                    event.strftime('%M')
                );
                $('.secs').text(
                    event.strftime('%S')
                );
            });
        }

    //plan-tab-switcher
    $('.plan-tab-switcher').on('click', function() {
        $(this).toggleClass('active');
        $('.plan-area').toggleClass('change-subs-duration');
        $('.plan-tab').toggleClass('change-color');
    });

    // pie-chart
    function progressBarInit() {
        var progressChart = $('.chart');
        progressChart.easyPieChart({
            size: 160,
            barColor: '#E80000',
            scaleColor: false,
            lineWidth: 8,
            trackColor: '#ffffff',
            lineCap: 'circle',
            animate: 8000
        });
    }
    var $caseStudyThreeContainer = $('.grid');
    if ($caseStudyThreeContainer.length > 0) {
        $('.grid').imagesLoaded(function() {
            var caseMasonry = $caseStudyThreeContainer.isotope({
                itemSelector: '.grid-item', // use a separate class for itemSelector, other than .col-
                masonry: {
                    gutter: 0
                }
            });
            $(document).on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                caseMasonry.isotope({
                    filter: filterValue
                });
            });
        });
        $(document).on('click', 'button', function() {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        });
    }

    // faq
    $('.faq-wrapper .faq-title').on('click', function(e) {
        var element = $(this).parent('.faq-item');
        if (element.hasClass('open')) {
            element.removeClass('open');
            element.find('.faq-content').removeClass('open');
            element.find('.faq-content').slideUp(300, "swing");
        } else {
            element.addClass('open');
            element.children('.faq-content').slideDown(300, "swing");
            element.siblings('.faq-item').children('.faq-content').slideUp(300, "swing");
            element.siblings('.faq-item').removeClass('open');
            element.siblings('.faq-item').find('.faq-title').removeClass('open');
            element.siblings('.taq-item').find('.faq-content').slideUp(300, "swing");
        }
    });
    /*-----------------------------
     *   Header Slider
     * ----------------------------*/

    // main-slider
    function activeHeaderSliderOne($scope) {
        var el = $scope.find('.header-carousel-one');
        var elSettings = el.data('settings');
        if ((el.children('div').length < 2) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return
        }
        let $selector = '#' + el.attr('id');

        let sliderSettings = {
            dots: false,
            infinete: elSettings.loop === 'yes',
            slidesToShow: elSettings.items,
            slidesToScroll: 1,
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            arrows: elSettings.nav === 'yes',
            appendArrows: $scope.find('.slick-carousel-controls .slider-nav'),
            appendDots: $scope.find('.slick-carousel-controls .slider-dots'),
            prevArrow: '<div class="prev-arrow">' + elSettings.navleft + '</div>',
            nextArrow: '<div class="next-arrow">' + elSettings.navright + '</div>',
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        }

        wowSlickInit($selector, sliderSettings);
    }
    /*----------------------------------
            Brand Slider Widget
    --------------------------------*/

    function activeBrandSlider($scope) {
        var el = $scope.find('.brand-slider')
        var elSettings = el.data('settings');

        if ((el.children('div').length < 1) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return;
        }
        var swiper = new Swiper('.brand-slider', {
            slidesPerView: elSettings.items,
            spaceBetween: parseInt(elSettings.margin),
            loop: elSettings.loop === 'yes',
            centeredSlides: elSettings.center === 'yes',
            autoplay: elSettings.autoplay === 'yes',
            navigation: {
                prevEl: '.prev-icon',
                nextEl: '.next-icon',
            },
            pagination: {
                el: '.custom-pagination',
            },
            breakpoints: {
                991: {
                    slidesPerView: 3,
                },
                767: {
                    slidesPerView: 2,
                },
                575: {
                    slidesPerView: 1,
                },
                420: {
                    slidesPerView: 1,
                },
            }
        });
    }


    /*----------------------------------
    Gallery Slider Widget
    --------------------------------*/
    function activeGallerySlider($scope) {
        var el = $scope.find('.brands-carousel')
        var elSettings = el.data('settings');
        if ((el.children('div').length < 1) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return;
        }
        let $selector = '#' + el.attr('id');

        let sliderSettings = {
            infinite: elSettings.loop === 'yes',
            slidesToShow: elSettings.items,
            slidesToScroll: 1,
            arrows: elSettings.nav === 'yes',
            dots: elSettings.dot === 'yes',
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            centerMode: elSettings.center === 'yes',
            appendArrows: $scope.find('.slick-carousel-controls .slider-nav'),
            appendDots: $scope.find('.slick-carousel-controls .slider-dots'),
            prevArrow: '<div class="prev-arrow">' + elSettings.navleft + '</div>',
            nextArrow: '<div class="next-arrow">' + elSettings.navright + '</div>',
            cssEase: 'linear',
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false
                    }
                }
            ]
        }
        wowSlickInit($selector, sliderSettings);
    }

    var $scprogressBar = $('.slider-controlprogress');
    var $progressBarLabel = $('.slider__label_Progress');
    $('.brands-carousel').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
        var calc = ((nextSlide) / (slick.slideCount - 1)) * 100;
        $scprogressBar
            .css('background-size', calc + '% 100%')
            .attr('aria-valuenow', calc);

        $progressBarLabel.text(calc + '% completed');
    });

    /*----------------------------
     * performance Slider
     * --------------------------*/
    function activePerformanceSliderOne($scope) {
        var el = $scope.find('.service-carousel');
        var elSettings = el.data('settings');
        if ((el.children('div').length < 2) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return
        }

        let $selector = '#' + el.attr('id');

        let sliderSettings = {
            infinite: elSettings.loop === 'yes',
            slidesToShow: elSettings.items,
            slidesToScroll: 1,
            arrows: elSettings.nav === 'yes',
            dots: elSettings.dot === 'yes',
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            centerMode: elSettings.center === 'yes',
            appendArrows: $scope.find('.slick-carousel-controls .slider-nav'),
            appendDots: $scope.find('.slick-carousel-controls .slider-dots'),
            prevArrow: '<div class="prev-arrow">' + elSettings.navleft + '</div>',
            nextArrow: '<div class="next-arrow">' + elSettings.navright + '</div>',
            centerPadding: '0',
            cssEase: 'linear',
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        }
        wowSlickInit($selector, sliderSettings);
    }

    /*----------------------------
    * Testimonial Slider - One
    * --------------------------*/
    function activeTestimonialSliderOne($scope) {

        var el = $scope.find('.yottaTestimonialOne');
        var elSettings = el.data('settings');
    
        if ((el.children('div').length < 1) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return;
        }
        var swiper = new Swiper('.yottaTestimonialOne', {
            slidesPerView: elSettings.items,
            spaceBetween: parseInt(elSettings.itemgap),
            loop: elSettings.loop == 'yes',
            centeredSlides: elSettings.center === 'yes',
            autoplay: elSettings.autoplay === 'yes' && {
                delay: elSettings.autoplaytimeout,
            },
            pauseOnMouseEnter: true,
            direction: elSettings.direction,
            navigation: {
                prevEl:  'prev-icon',
                nextEl:  'next-icon', 
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true,
            },
            breakpoints: {
                991: {
                    slidesPerView: 3,
                },
                767: {
                    slidesPerView: 2,
                },
                575: {
                    slidesPerView: 1,
                },
                420: {
                    slidesPerView: 1,
                },
            }
        });
    }

    /*----------------------------
     * Blog Post Grid Slider
     * --------------------------*/
    function activeBlogGridSliderOne($scope) {
        var el = $scope.find('.blog-grid-carousel');
        var elSettings = el.data('settings');
        if ((el.children('div').length < 2) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return
        }
        let $selector = '#' + el.attr('id');
        let sliderSettings = {
            infinete: elSettings.loop === 'yes',
            slidesToShow: elSettings.items,
            slidesToScroll: 1,
            arrows: elSettings.nav === 'yes',
            appendArrows: $scope.find('.blog-slider-controls .slider-nav'),
            prevArrow: '<div class="prev-arrow">' + elSettings.navleft + '</div>',
            nextArrow: '<div class="next-arrow">' + elSettings.navright + '</div>',
            dots: false,
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            cssEase: 'linear',
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        }
        wowSlickInit($selector, sliderSettings);
    }

    /*----------------------------
    * Service Grid Slider
    * --------------------------*/
    function activeServiceGridSliderOne($scope) {
        var el = $scope.find('.service-grid-carousel');
        var elSettings = el.data('settings');
        if ((el.children('div').length < 2) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return
        }

        let $selector = '#' + el.attr('id');

        let sliderSettings = {
            infinite: elSettings.loop === 'yes',
            slidesToShow: elSettings.items,
            slidesToScroll: 1,
            arrows: elSettings.nav === 'yes',
            appendArrows: $scope.find('.service-slider-controls .slider-nav'),
            prevArrow: '<div class="prev-arrow">' + elSettings.navleft + '</div>',
            nextArrow: '<div class="next-arrow">' + elSettings.navright + '</div>',
            dots: false,
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            centerMode: elSettings.center === 'yes',
            centerPadding: '0',
            cssEase: 'linear',
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        }
        wowSlickInit($selector, sliderSettings);
    }

    /*----------------------------
         Team Member Slider
    * --------------------------*/
    function activeTeamMemberSliderOne($scope) {
        var el = $scope.find('.team-member-carousel');
        var elSettings = el.data('settings');
        if ((el.children('div').length < 2) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
            return
        }

        let $selector = '#' + el.attr('id');

        let sliderSettings = {
            infinite: elSettings.loop === 'yes',
            slidesToShow: elSettings.items,
            slidesToScroll: 1,
            arrows: elSettings.nav === 'yes',
            dots: elSettings.dot === 'yes',
            appendArrows: $scope.find('.slick-carousel-controls .slider-nav'),
            appendDots: $scope.find('.slick-carousel-controls .slider-dots'),
            prevArrow: '<div class="prev-arrow">' + elSettings.navleft + '</div>',
            nextArrow: '<div class="next-arrow">' + elSettings.navright + '</div>',
            autoplaySpeed: elSettings.autoplaytimeout,
            autoplay: elSettings.autoplay === 'yes',
            centerMode: elSettings.center === 'yes',
            centerPadding: '0',
            cssEase: 'linear',
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        arrows: false
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false
                    }
                }
            ]
        }
        wowSlickInit($selector, sliderSettings);
    }


    //slick init function
    function wowSlickInit($selector, settings, animateOut = false) {
        $($selector).slick(settings);
    }

    // function yottaTabs( $scope ) {
    //    let navItem = $scope.find('.yotta-tabs-nav .nav > a');
    //    $(navItem).on('click', function(){
    //       let elId = $(this).attr('href');
    //         $(elId).addClass('show');
    //    });
    // }

//Odometer
// if ($(".statistics-item").length) {
//     $(".statistics-item").each(function () {
//       $(this).isInViewport(function (status) {
//         if (status === "entered") {
//           for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
//             var el = document.querySelectorAll('.odometer')[i];
//             el.innerHTML = el.getAttribute("data-odometer-final");
//           }
//         }
//       });
//     });
//   }

    /*------------------------------
    counter section activation
    -------------------------------*/
    function counterupInit($scope) {
        $scope.counterUp({
            delay: 20,
            time: 3000
        });
    }
    $(document).ready(function () {
        /*--------------------
          wow js init
      ---------------------*/
        new WOW().init();

        /*---------------------------------
         * Magnific Popup
         * --------------------------------*/
        $('.video-play-btn,.video-play-btn-02,.play-video-btn,.button-video').magnificPopup({
            type: 'video',
            removalDelay: 400,
            preloader: false,
        });

    });

})(jQuery);