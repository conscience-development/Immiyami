//========================================
//        NAVBAR FIXED WHEN SCROLL
//========================================
$(window).on("scroll", function () {
    var scrolling = $(this).scrollTop();
    if (scrolling > 100) {
        $(".header-part").addClass("header-fixed");
    } else {
        $(".header-part").removeClass("header-fixed");
    }
});

//========================================
//     HEADER SEARCH ADVANCE OPTION
//========================================
$(".option-btn").on("click", function () {
    $(".header-search").toggleClass("active");
    $(".header-option").slideToggle("slow");
});

//========================================
//       HEADER RESPONSIVE SEARCH
//========================================
$(".search-btn").on("click", function () {
    $(".header-form").slideToggle("slow");
    $(this).children(".fa-search").toggleClass("fa-times");
});

//========================================
//          SIDEBAR MENU SLIDE
//========================================
$(".sidebar-btn").on("click", function () {
    $(".sidebar-part").addClass("active");
    $(".sidebar-cross").on("click", function () {
        $(".sidebar-part").removeClass("active");
    });
});

//========================================
//     HEADER ICON DROPDOWN CARD
//========================================
$(".header-widget").on("click", function () {
    $(this).next(".dropdown-card").slideToggle();

    var dropdownCard = $(this).next(".dropdown-card");
    if ($(".dropdown-card:visible")) {
        $(".dropdown-card").hide();
        dropdownCard.show();
    } else if ($(".dropdown-card:hidden")) {
        dropdownCard.show();
    }
});

//========================================
//        DROPDOWN CATEGORY MENU
//========================================
$(function () {
    $(".navbar-dropdown a").click(function () {
        $(this).next().toggle();
        if ($(".dropdown-list:visible").length > 1) {
            $(".dropdown-list:visible").hide();
            $(this).next().show();
        }
    });
});

//========================================
//         NASTED DROPDOWN MENU
//========================================
$(function () {
    $(".nasted-menu").click(function () {
        $(this).next().toggle();
        if ($(".nasted-menu-list:visible").length > 1) {
            $(".nasted-menu-list:visible").hide();
            $(this).next().show();
        }
    });
});

//========================================
//        FEATURE WISHLIST ACTIVE
//========================================
$(".feature-wish").on("click", function () {
    $(this).toggleClass("active");
});

//========================================
//     PRODUCT CARD WISHLIST ACTIVE
//========================================
$(".product-btn .fa-heart").on("click", function () {
    $(this).toggleClass("fas");
});

//========================================
//      LANGUAGE OR CURRENCY ACTIVE
//========================================
$(".modal-link").on("click", function () {
    $(".modal-body").children().removeClass("active");
    $(this).addClass("active");
});

//========================================
//        PRODUCT WIDGET CATEGORY
//========================================
$(".product-widget-link").on("click", function () {
    $(".product-widget-link").removeClass("active");
    $(".product-widget-dropdown").slideUp("slow");

    $(this).addClass("active");
    $(this).next(".product-widget-dropdown").slideDown("slow");
});

//========================================
//        PASSWORD HIDE & SHOW LOGIN
//========================================
$(".eye").on("click", function () {
    $(".eye").toggleClass("fa-eye-slash");
    $(".eye").toggleClass("fa-eye");

    var input = $("#pass");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
//========================================
//        PASSWORD HIDE & SHOW RIGISTER MEMBER
//========================================
$(".eyeM").on("click", function () {
    $(".eyeM").toggleClass("fa-eye-slash");
    $(".eyeM").toggleClass("fa-eye");

    var input = $("#passM");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
$(".eyeMC").on("click", function () {
    $(".eyeMC").toggleClass("fa-eye-slash");
    $(".eyeMC").toggleClass("fa-eye");

    var input = $("#passMC");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
//========================================
//        PASSWORD HIDE & SHOW RIGISTER SUPPLIER
//========================================
$(".eyeS").on("click", function () {
    $(".eyeS").toggleClass("fa-eye-slash");
    $(".eyeS").toggleClass("fa-eye");

    var input = $("#passS");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
$(".eyeSC").on("click", function () {
    $(".eyeSC").toggleClass("fa-eye-slash");
    $(".eyeSC").toggleClass("fa-eye");

    var input = $("#passSC");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

//========================================
//        PASSWORD HIDE & SHOW Password Reset
//========================================
$(".eyePR").on("click", function () {
    $(".eyePR").toggleClass("fa-eye-slash");
    $(".eyePR").toggleClass("fa-eye");

    var input = $("#passPR");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
$(".passPRC").on("click", function () {
    $(".passPRC").toggleClass("fa-eye-slash");
    $(".passPRC").toggleClass("fa-eye");

    var input = $("#passPRC");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

//========================================
//        SIDEBAR TAB TOGGLE
//========================================
$(".navbar-widget li").on("click", function () {
    $(".navbar-widget li").removeClass("active");
    $(this).addClass("active");
});

//========================================
//        SIDEBAR HIDE & SHOW
//========================================
$(".navbar-user").on("click", function () {
    $(".sidebar-part").addClass("active");
    $(".cross-btn").on("click", function () {
        $(".sidebar-part").removeClass("active");
    });
});

//========================================
//        USER EDIT OPTION
//========================================
$(".edit-btn").on("click", function () {
    $(".edit-option").addClass("active");
    $(".cancel").on("click", function () {
        $(".edit-option").removeClass("active");
    });
});

//========================================
//        MESSAGE SEARCH BAR
//========================================
$(".message-filter-btn").on("click", function () {
    $(".message-filter-src").toggleClass("active");
    $(this).children(".fa-search").toggleClass("fa-times");
});

//========================================
//        MESSAGE ACTIVE LIST
//========================================
$(".message-item").on("click", function () {
    $(".message-list li").removeClass("active");
    $(this).addClass("active");
});

//========================================
//        FOLLOW AUTHOR ACTIVE
//========================================
$(".author-widget .follow").on("click", function () {
    $(this).toggleClass("active");
});

//========================================
//        WISHLIST ACTIVE
//========================================
$(".wish").on("click", function () {
    $(this).toggleClass("active");
});

//========================================
//        REVIEW WIDGET MENU
//========================================
$(".review-dots-btn").on("click", function () {
    $(this).next(".review-widget-list").toggleClass("active");
});

//check link in article and add target
$(function () {
    $(".blog-details-content")
        .find("a")
        .each(function (ev) {
            $(this).attr("target", "_blank");
        });
});

//Back To top
$(document).ready(function () {
    //Get the button
    let btn_back_top = document.getElementById("btn-back-to-top");
    if (typeof element != "undefined" && element != null) {
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction();
        };

        function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                btn_back_top.style.display = "block";
            } else {
                btn_back_top.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        btn_back_top.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    }
});

// play Video Section Home

$(document).ready(function () {
    $(".vid").on("click", function () {
        // get required DOM Elements
        var iframe_src = $(this).find("iframe").attr("src"),
            iframe = $(".video-popup"),
            iframe_video = $(".video-popup iframe"),
            close_btn = $(".close-video");
        iframe_src = iframe_src + "?autoplay=1&rel=0"; // for autoplaying the popup video

        // change the video source with the clicked one
        $(iframe_video).attr("src", iframe_src);
        $(iframe).fadeIn().addClass("show-video");

        // remove the video overlay when clicking outside the video
        $(".close-video").on("click", function (e) {
            $(iframe).removeClass("show-video");
            $(iframe_video).attr("src", "");
        });
    });
    $(".vidp").on("click", function () {
        $("#pVideoModel").modal({
            keyboard: false,
        });

        $(".modal-backdrop").show();
    });
});

//ReadMore Js Section
$(document).ready(function () {
    $(".readmoreriv").readmore({
        speed: 100,
        collapsedHeight: 100,
        heightMargin: 16,
        moreLink: '<a href="#" class="btn-rd-more">Read More</a>',
        lessLink: '<a href="#" class="btn-rd-more">Read less</a>',
        embedCSS: true,
        blockCSS: "display: block; width: 100%;",
        startOpen: false,

        // callbacks
        blockProcessed: function () {},
        beforeToggle: function () {},
        afterToggle: function () {},
    });
    $(".readmore").readmore({
        speed: 100,
        collapsedHeight: 200,
        heightMargin: 16,
        moreLink:
            '<a href="#" class="btn-rd-more"><i class="fas fa-arrow-down"></i></a>',
        lessLink:
            '<a href="#" class="btn-rd-more"><i class="fas fa-arrow-up"></i></a>',
        embedCSS: true,
        blockCSS: "display: block; width: 100%;",
        startOpen: false,

        // callbacks
        blockProcessed: function () {},
        beforeToggle: function () {},
        afterToggle: function () {},
    });
    $(".readmorecond").readmore({
        speed: 100,
        collapsedHeight: 100,
        heightMargin: 16,
        moreLink:
            '<a href="#" class="btn-rd-more"><i class="fas fa-arrow-down"></i></a>',
        lessLink:
            '<a href="#" class="btn-rd-more"><i class="fas fa-arrow-up"></i></a>',
        embedCSS: true,
        blockCSS: "display: block; width: 100%;",
        startOpen: false,

        // callbacks
        blockProcessed: function () {},
        beforeToggle: function () {},
        afterToggle: function () {},
    });
    // Javascript to enable link to tab
    var hash = document.location.hash;
    if (hash) {
        // console.log(hash);
        $(".nav-tabs a[href=\\" + hash + "]").tab("show");
    }

    // Change hash for page-reload
    $(".nav-tabs a").on("shown.bs.tab", function (e) {
        // e.preventDefault();
        // window.location.hash = e.target.hash;
    });
});

$(".previewAdModal").click(function () {
    //     // alert('s');
    // $('.ad-details-slider').slick('unslick')
    // $('.ad-thumb-slider').slick('unslick')

    var title = $("#title").val();
    $("#post_title_js").text(title);
    // var file = $("#addpostCoverPhoto").get(0).files[0];
    // if (file) {
    //     var reader = new FileReader();
    //     reader.onload = function(){
    //         console.log(reader.result);
    //         $('.ad-details-slider').slick('slickRemove',0);
    //         $('.ad-thumb-slider').slick('slickRemove',0);
    //         $('.ad-details-slider').slick('slickAdd','<div><img src="'+reader.result+'" alt="details"></div>');
    //         $('.ad-thumb-slider').slick('slickAdd','<div><img src="'+reader.result+'" alt="details"></div>');
    //         // var imgDiv =  '<div><img src="'+reader.result+'" alt="details"></div>';
    //         // $('#post_slider_js').append(imgDiv);
    //         // $('#post_slider_thumb_js').append(imgDiv);
    //     }
    //     reader.readAsDataURL(file);
    // }

    var inputCover = $("#addpostCoverPhoto").get(0);
    if (inputCover.files) {
        var filesAmountC = inputCover.files.length;

        for (i = 0; i < filesAmountC; i++) {
            var reader = new FileReader();

            reader.onload = function (event) {
                // console.log(event.target);
                $(".ad-details-slider").slick("slickRemove", i);
                $(".ad-thumb-slider").slick("slickRemove", i);
                $(".ad-details-slider").slick(
                    "slickAdd",
                    '<div><img src="' +
                        event.target.result +
                        '" alt="details"></div>'
                );
                $(".ad-thumb-slider").slick(
                    "slickAdd",
                    '<div><img src="' +
                        event.target.result +
                        '" alt="details"></div>'
                );
                // var imgDiv =  '<div><img src="'+event.target.result+'" alt="details"></div>';
                // $('#post_slider_js').append(imgDiv);
                // $('#post_slider_thumb_js').append(imgDiv);
            };

            reader.readAsDataURL(inputCover.files[i]);
        }
    }

    var input = $("#addpostImages").get(0);
    if (input.files) {
        var filesAmount = input.files.length;
        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();

            reader.onload = function (event) {
                $(".ad-details-slider").slick("slickRemove", i);
                $(".ad-thumb-slider").slick("slickRemove", i);
                $(".ad-details-slider").slick(
                    "slickAdd",
                    '<div><img src="' +
                        event.target.result +
                        '" alt="details"></div>'
                );
                $(".ad-thumb-slider").slick(
                    "slickAdd",
                    '<div><img src="' +
                        event.target.result +
                        '" alt="details"></div>'
                );
                // var imgDiv =  '<div><img src="'+event.target.result+'" alt="details"></div>';
                // $('#post_slider_js').append(imgDiv);
                // $('#post_slider_thumb_js').append(imgDiv);
            };

            // console.log(i);

            reader.readAsDataURL(input.files[i]);
        }
    }

    var catHTML = "";
    var cuntHTML = "";
    var catHTMLs = "";
    var cuntHTMLs = "";
    var categories = [];
    var countries = [];
    $.each($("#categoriesSet option:selected"), function () {
        categories.push($(this).text());
    });
    $.each($("#countriesSet option:selected"), function () {
        countries.push($(this).text());
        console.log($(this).text());
    });

    // console.log(countries);
    $.each(categories, function (index, value) {
        catHTML += '<span class="flat-badge rent">' + value + "</span>";
        catHTMLs +=
            '<li><span class="flat-badge sale">' + value + "</span></li>";
    });
    $.each(countries, function (index, value) {
        cuntHTML += '<span class="flat-badge rent">' + value + "</span>";
        cuntHTMLs +=
            '<li><span class="flat-badge sale">' + value + "</span></li>";
    });

    $("#posts_categories_js").html("");
    $("#post_category_b_js").html("");
    $("#post_country_b_js").html("");
    $("#post_category_b_js").html("<h6>Categories:</h6>");
    $("#post_country_b_js").html("<h6>Countries:</h6>");
    $("#posts_categories_js").append(catHTMLs);
    $("#post_category_b_js").append(catHTML);
    $("#post_country_b_js").append(cuntHTML);
    var desc = $("#description").val();
    $("#post_desc_js").html(desc);

    // var catHTML = '';
    // var catHTMLs = '';
    // var categories = [];
    // $.each($("#categoriesSet option:selected"), function(){
    //     categories.push($(this).text());
    // });
    // $.each(categories, function( index, value ) {
    //     catHTML += '<span class="flat-badge rent">'+value+'</span>';
    //     catHTMLs += '<li><span class="flat-badge sale">'+value+'</span></li>';
    // });

    // $('#posts_categories_js').html('');
    // $('#post_category_b_js').html('');
    // $('#post_category_b_js').html('<h6>category:</h6>');
    // $('#posts_categories_js').append(catHTMLs);
    // $('#post_category_b_js').append(catHTML);
    // var desc = $('#descriptionSet').val();
    // $('#post_desc_js').html(desc);

    $("#previewAdModal").modal();
});

$(".previewAdModal2").click(function () {
    //     // alert('s');
    // $('.ad-details-slider').slick('unslick')
    // $('.ad-thumb-slider').slick('unslick')

    var title = $("#editpostTitle").val();
    $("#post_title_js2").text(title);
    // var file = $("#addpostCoverPhoto").get(0).files[0];
    // if (file) {
    //     var reader = new FileReader();
    //     reader.onload = function(){
    //         console.log(reader.result);
    //         $('.ad-details-slider').slick('slickRemove',0);
    //         $('.ad-thumb-slider').slick('slickRemove',0);
    //         $('.ad-details-slider').slick('slickAdd','<div><img src="'+reader.result+'" alt="details"></div>');
    //         $('.ad-thumb-slider').slick('slickAdd','<div><img src="'+reader.result+'" alt="details"></div>');
    //         // var imgDiv =  '<div><img src="'+reader.result+'" alt="details"></div>';
    //         // $('#post_slider_js').append(imgDiv);
    //         // $('#post_slider_thumb_js').append(imgDiv);
    //     }
    //     reader.readAsDataURL(file);
    // }

    var inputCover = $("#editpostCoverPhoto").get(0);
    if (inputCover.files) {
        var filesAmountC = inputCover.files.length;

        for (i = 0; i < filesAmountC; i++) {
            var reader = new FileReader();

            reader.onload = function (event) {
                // console.log(event.target);
                $(".ad-details-slider2").slick("slickRemove", i);
                $(".ad-thumb-slider2").slick("slickRemove", i);
                $(".ad-details-slider2").slick(
                    "slickAdd",
                    '<div><img src="' +
                        event.target.result +
                        '" alt="details"></div>'
                );
                $(".ad-thumb-slider2").slick(
                    "slickAdd",
                    '<div><img src="' +
                        event.target.result +
                        '" alt="details"></div>'
                );
                // var imgDiv =  '<div><img src="'+event.target.result+'" alt="details"></div>';
                // $('#post_slider_js').append(imgDiv);
                // $('#post_slider_thumb_js').append(imgDiv);
            };

            reader.readAsDataURL(inputCover.files[i]);
        }
    }

    var input = $("#editpostPhotos").get(0);
    if (input.files) {
        var filesAmount = input.files.length;
        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();

            reader.onload = function (event) {
                $(".ad-details-slider").slick("slickRemove", i);
                $(".ad-thumb-slider").slick("slickRemove", i);
                $(".ad-details-slider").slick(
                    "slickAdd",
                    '<div><img src="' +
                        event.target.result +
                        '" alt="details"></div>'
                );
                $(".ad-thumb-slider").slick(
                    "slickAdd",
                    '<div><img src="' +
                        event.target.result +
                        '" alt="details"></div>'
                );
                // var imgDiv =  '<div><img src="'+event.target.result+'" alt="details"></div>';
                // $('#post_slider_js').append(imgDiv);
                // $('#post_slider_thumb_js').append(imgDiv);
            };
            // console.log(i);
            reader.readAsDataURL(input.files[i]);
        }
    }

    var catHTML = "";
    var cuntHTML = "";
    var catHTMLs = "";
    var cuntHTMLs = "";
    var categories = [];
    var countries = [];
    $.each($("#cates option:selected"), function () {
        categories.push($(this).text());
    });

    $.each($("#countryId option:selected"), function () {
        // console.log($(this).text());
        countries.push($(this).text());
    });

    $.each(categories, function (index, value) {
        catHTML += '<span class="flat-badge rent">' + value + "</span>";
        catHTMLs +=
            '<li><span class="flat-badge sale">' + value + "</span></li>";
    });
    $.each(countries, function (index, value) {
        cuntHTML += '<span class="flat-badge rent">' + value + "</span>";
        cuntHTMLs +=
            '<li><span class="flat-badge sale">' + value + "</span></li>";
    });
    // console.log(cuntHTMLs);

    $("#posts_categories_js2").html("");
    $("#post_category_b_js2").html("");
    $("#post_country_b_js2").html("");
    $("#post_category_b_js2").html("<h6>Categories:</h6>");
    $("#post_country_b_js2").html("<h6>Countries:</h6>");
    $("#posts_categories_js2").append(catHTMLs);
    $("#post_category_b_js2").append(catHTML);
    $("#post_country_b_js2").append(cuntHTML);
    var desc = $("#description").val();
    $("#post_desc_js2").html(desc);

    $("#previewAdModal2").modal();
});
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
function getSelectValues(select) {
    var result = [];
    var options = select && select.options;
    var opt;

    for (var i = 0, iLen = options.length; i < iLen; i++) {
        opt = options[i];

        if (opt.selected) {
            result.push(opt.value || opt.text);
        }
    }
    return result;
}

$(function () {
    setTimeout(function () {
        $(".message").hide();
    }, 5000);
});

$("#regMember #passM, #regMember #passMC").on("keyup", function () {
    if ($("#passM").val() == $("#passMC").val()) {
        // alert('s');
        $("#passM,#passMC").css("border-color", "green");
        $(".reg-btn-sub-d").attr("disabled", false);
    } else {
        $("#passM,#passMC").css("border-color", "red");
        // $(".reg-btn-sub-d").attr("disabled", true);
    }
});

$("#reSetPass #passM, #reSetPass #passMC").on("keyup", function () {
    if ($("#passM").val() == $("#passMC").val()) {
        // alert('s');
        $("#passM,#passMC").css("border-color", "green");
        $(".reg-btn-sub-d").attr("disabled", false);
    } else {
        $("#passM,#passMC").css("border-color", "red");
        $(".reg-btn-sub-d").attr("disabled", true);
    }
});

$("#passS, #passSC").on("keyup", function () {
    if ($("#passS").val() == $("#passSC").val()) {
        // alert('s');
        $("#passS,#passSC").css("border-color", "green");
        $(".reg-btn-sub-d").attr("disabled", false);
    } else {
        $("#passS,#passSC").css("border-color", "red");
        // $(".reg-btn-sub-d").attr("disabled", true);
    }
});

$(".reg-btn-subM").click(function () {
    if ($("#passM").val() == "" && $("#passMC").val() == "") {
        // $(this).attr("disabled", true);
    }
});

$(".reg-btn-subS").click(function () {
    if ($("#passS").val() == "" && $("#passSC").val() == "") {
        // $(this).attr("disabled", true);
    }
});
