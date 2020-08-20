function load(){
    let loader = document.querySelector('#loader');
    loader.parentNode.removeChild(loader);
}

$(document).ready(function () {

    new WOW().init();

    var $header_top = $('.header-top');

    // toggle menu  web
    $header_top.find('a.toggle-menu').on('click', function() {
        $(this).parent().toggleClass('open-menu ');

    });
    new Swiper('.aboutus  .testimonials_section .swiper-container', {
        slidesPerView: 1,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },

        lazy: true,
        pagination: {
            el: '.testimonials_section .swiper-pagination',
            clickable: true,
        },


    });









    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());
});

$(document).on( "click" , function (event) {
        var clickover = $(event.target);
        var _opened = $(".menu-container").hasClass("open-menu");
        if (_opened === true && !clickover.hasClass("toggle-menu")) {
            $(".toggle-menu").click();
        }
    });

// fullpage customization
$('#fullpage').fullpage({
    autoScrolling:true,
    scrollHorizontally: true,
    sectionsColor: '#F9F9F9',
    background:'#ED1E53',
    sectionSelector: '.vertical-scrolling',
    slideSelector: '.horizontal-scrolling',
    navigation: true,
    slidesNavigation: true,
    controlArrows: false,
    anchors: ['firstSection', 'secondSection', 'thirdSection', 'fourthSection', 'fifthSection', 'sixSection'],
    menu: '#menu',


});

if($("html").find(".aboutus").length > 0){
    var words = $(".typed").data("words").split("|");
    var typed = $(".typed");

    $(function() {
        typed.typed({
            strings: words,
            typeSpeed: 100,
            loop: false,
        });
    });


}