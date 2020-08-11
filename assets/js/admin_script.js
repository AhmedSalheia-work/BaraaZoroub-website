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
        autoplay:false,

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

if($("html").find(".aboutus").length > 0){
    var words = $(".typed").data("words").split("|");
    var typed = $(".typed");

    $(function() {
        typed.typed({
            strings: words,
            typeSpeed: 120,
            loop: true,
        });
    });


}

// Admin Action

// لاظهار فورم اختيار الملف عند الضغط على ايقونة بلس
$(".update-image .edit , .add-image .add").on("click" , function(e){
    // e.preventDefault();
    // e.stopPropagation();
    $(this).next("input[type='file']").click();
});

$(".update-image input[type='file']").on("change" , function(){
    var input = this;
    var url = $(this).val();
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
        var reader = new FileReader();

        reader.onload = function (e) {
            if($(input).parents(".home").length > 0){
                // لتغيير صورة الخلفية في صفحة الهوم عند اختيار الملف
                $(input).parents("div.section").css('backgroundImage', `url(${e.target.result})`);
                let saveBtn = $(input).parents("div.section").find('.our-save-btn');
                saveBtn.css("display" , "block");
                saveBtn.show();
            }else if($(input).parents(".section-1").length > 0 ){
                // لتغيير صورة الخلفية في صفحة الهوم عند اختيار الملف
                $(input).parents(".section-1").css('backgroundImage', `url(${e.target.result})`);
                $('#submit').removeAttr('disabled');

            }
            else if($(input).parents(".aboutus").length > 0){
                //لتغيير الصورة عند اختيار الملف
                $(input).parents("figure , .logo , .project").find("img").attr("src" , e.target.result);

            }else if($(input).parents(".project").length > 0 ){
                //لتغيير الصورة عند اختيار الملف
                $(input).parents("figure , .logo , .project").find(".want").css('background', `url(${e.target.result}) 0 0/ 100% 100% no-repeat`);
            }
        }
        reader.readAsDataURL(input.files[0]);
    }
});

function show(n){
    $('#save'+n).css('display','');
}

$(".add-image input[type='file']").on("change" , function(){
    var input = this;
    var url = $(this).val();
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
        $('#add_form .project .add-image span').remove();
        for (i=0; i<input.files.length; i++){

            var reader = new FileReader();

            reader.onload = function (e) {
                if($(input).parents(".clients").length > 0){
                    $(".clients .row:first-of-type").append(`
                        <div class=" logo m-1 m-auto p-1 col-6   col-md-3 ">
                            <div class="ground  d-flex align-items-center justify-content-center " style=" height: 159px;">
                                <div class="update-image">
                                    <span class="edit">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    <input type="file" name="image" id="" style="display: none;">
                                </div>
                                <div class="delete-image">
                                    <span class="delete">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </div>

                                <img src="${e.target.result}" class="img-fluid size" alt="newline" title="newline" style=" height: 115px;">
                            </div>
                        </div>
                    `);
                }else if( $(input).parents(".product-page").length > 0){
                    $(".project.add-project").before(`
                        <div class="project mb-3">
                            <div class="update-image">
                                <input type="file" name="image" id="" style="display: none;">
                            </div>

                            <img src="${e.target.result}" alt="project_img" class="img-fluid w-100 min-vh-100" title="project">
                        </div>
                    `);
                }
            }

            reader.readAsDataURL(input.files[i]);
        }
    }
});



$(".typed").on("click" , function(){
    $(this).hide();
    $(this).next(".form-group").show();
});

$(".aboutme pre").on("click" , function(){
    let content = $(this).text();
    $(this).replaceWith(`<textarea class="form-control" name="desc">${content}</textarea>`)
});

$("[data-name]").on("click" , function(){
    let content = $(this).text();
    let name = $(this).data("name");
    let type = $(this).data("type");
    if(type == 'text'){
        $(this).replaceWith(`<input class="form-control" type="text" name="${name}" value="${content}" />`)
    }else if(type == 'textarea'){
        $(this).replaceWith(`<textarea class="form-control" name="${name}" style="min-height:200px">${content}</textarea>`)
    }
});

function star(num,n){
    let stars = document.querySelectorAll('.star_'+num);
    $('.star_'+num).next('input[type="hidden"]').val(n);

    for (i=0;i<stars.length;i++){
        let $class = 'checked';
        if (num == 'add'){
            $class = 'text-primary';
        }
        stars[i].classList.remove($class);
        if (i<n){
            stars[i].classList.add($class);
        }
    }
}