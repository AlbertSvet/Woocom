

jQuery(document).ready(function ($) {
    "use strict";
    
    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);

        // Код для мобильной версии
    $('.navbar-toggler').on('click', function () {
        $(this).toggleClass('active');
        $('.navbar-collapse').collapse('toggle');
    });

    // Выпадающее меню
    $('.navbar .dropdown').on('show.bs.dropdown', function () {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
    });

    $('.navbar .dropdown').on('hide.bs.dropdown', function () {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(150);
    });
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Vendor carousel
    $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:2
            },
            576:{
                items:3
            },
            768:{
                items:4
            },
            992:{
                items:5
            },
            1200:{
                items:6
            }
        }
    });
    // recent-product
    $('.recent-product').owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        autoplay: true,
        autoplayTimeout: 2000,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:2
            },
            576:{
                items:3
            },
            768:{
                items:4
            },
            992:{
                items:4
            },
            1200:{
                items:4
            }
        }
    });


    // Related carousel
    $('.related-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            }
        }
    });




    // Product Quantity
 
        $('main.main').on('click', '.quantity button', function () {
            var button = $(this);
            var oldValue = button.parent().parent().find('input').val();
            if (button.hasClass('btn-plus')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            button.parent().parent().find('input').val(newVal);
            $('.updateCart').prop('disabled', false);
        });
   
    
    
    
    try{
        const btnConvas = document.querySelector('.offcanvas');
        const btnOpen = document.querySelector('.p-1');
        const btnClose = document.querySelector('.btn-close');
        
        btnClose.addEventListener('click', () =>{
            btnConvas.classList.remove('showTwo');
        })
        btnOpen.addEventListener('click', () =>{
            if (btnConvas.classList.contains('showTwo')) {
                // Если корзина открыта, закрываем ее
                btnConvas.classList.remove('showTwo');
            } else {
                // Если корзина закрыта, открываем ее
                btnConvas.classList.add('showTwo');
            }
        })

        // https://gist.github.com/bagerathan/2b57e7413bfdd09afa04c7be8c6a617f
        $('body').on('adding_to_cart', function (e, btn, data) {
            btn.closest('.product-item').find('.ajax-loader').fadeIn();
        });

        $('body').on('added_to_cart', function (e, response_fragments, response_cart_hash, btn) {
            btn.closest('.product-item').find('.ajax-loader').fadeOut();
        });
    }catch(er){
      
    }
});




