$=jQuery;

window.FontAwesomeConfig = {
    searchPseudoElements: true
}

/*----------------------------------navigation-searchbar---------------*/

$(document).ready(function(){

    $('.bm-search-trigger').on('click', function(event){
        event.preventDefault();
        toggleSearch();
        closeNav();
    });

    function toggleSearch(type) {
        if(type=="close") {
            //close serach 
            $('.bm-search').removeClass('is-visible');
            $('.bm-search-trigger').removeClass('search-is-visible');
            $('.bm-overlay').removeClass('search-is-visible');
        } else {
            //toggle search visibility
            $('.bm-search').toggleClass('is-visible');
            $('.bm-search-trigger').toggleClass('search-is-visible');
            $('.bm-overlay').toggleClass('search-is-visible');
        }
    }


function closeNav() {
    $('.bm-nav-trigger').removeClass('nav-is-visible');
    $('.bm-searrch-header').removeClass('nav-is-visible');
    $('.bm-primary-nav').removeClass('nav-is-visible');
    $('.has-children ul').addClass('is-hidden');
    $('.has-children a').removeClass('selected');
    $('.moves-out').removeClass('moves-out');
    $('.bm-main-content').removeClass('nav-is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
        $('body').removeClass('overflow-hidden');
    });
}

});

/*------ banner -------------*/

$(document).ready(function(){
    $('#owl-banner-carousel').owlCarousel({
        loop:true,
        margin:0,
        autoHeight:true,
        nav:true,
        autoplay: true,
        autoPlaySpeed: blog_mantra_script_vars.autoPlaySpeed,
        autoplayTimeout: blog_mantra_script_vars.autoplayTimeout,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    $('.owl-prev').html('<i class="fa fa-chevron-left"></i>');
    $('.owl-next').html('<i class="fa fa-chevron-right"></i>');
});


/*------------ banner - multiple at time -------------*/

$(document).ready(function(){
    $('#owl-banner-carousel-one').owlCarousel({
        loop:true,
        margin:0,
        dots: true,
        autoHeight:true,
        nav:true,
        autoplay: true,
        autoPlaySpeed: blog_mantra_script_vars.autoPlaySpeed,
        autoplayTimeout: blog_mantra_script_vars.autoplayTimeout,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:3
            }
        }
    });
    $('.owl-prev').html('<i class="fa fa-chevron-left"></i>');
    $('.owl-next').html('<i class="fa fa-chevron-right"></i>');
});



/*----- scroll to top --------*/


$(document).ready(function(){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100){
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

});
