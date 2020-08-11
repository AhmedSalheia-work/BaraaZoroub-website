<script src="assets/js/jQuery3.4.1.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"> </script>
<script src="assets/js/swiper.min.js"> </script>
<script src="assets/js/fullpage.min.js"></script>

<script src="assets/js/jquery.fancybox.min.js"> </script>
<script src="assets/js/typed.js"> </script><script src="assets/js/wow.js"> </script>

<script>

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

    var typed = $(".typed");

    $(function() {
        typed.typed({
            strings: ["Hello :) ", "I’m Baraa Zoroub."],
            typeSpeed: 120,
            loop: true,
        });
    });

</script>

