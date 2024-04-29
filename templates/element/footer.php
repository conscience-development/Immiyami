     		<!--=====================================
                    FOOTER PART PART
        =======================================-->
     		<footer class="footer-part <?if($page!='membership'){ echo 'mt-5';}?>">
     		    <div class="container">

     		        <?  echo $this->element('reviews'); ?>


     		    </div>
     		    <div class="footer-mid">
     		        <div class="container">
     		            <div class="footer-mid-content">
     		                <div class="row">
     		                    <div class="col-sm-6 col-md-6 col-lg-6 subc">
     		                        <!-- subscriptionFooter -->
     		                        <h3>Stay in the loop with our newsletter!</h3>
     		                        <?= $this->Form->create($subscription,['url'=>'/Subscriptions/subscription']) ?>
     		                        <input type="email" name="email" placeholder="Define E-Mail Address">
     		                        <button class="btn-f-m">
     		                            <i class="fas fa-paper-plane"></i>
     		                            <!-- <span>Subscribe</span> -->
     		                        </button>
     		                        <?= $this->Form->end() ?>
     		                        <p class=" mt-3">Many moons ago, the founders of ImmiYami embarked on a journey similar
     		                            to yours - seeking a new home in a foreign land. As kindred spirits, we understand
     		                            the challenges and aspirations that come with the immigration process.</p>
     		                    </div>
     		                    <div class="col-sm-6 col-md-6 col-lg-2">
     		                        <div class="footer-content">
     		                            <h3>Contact Us</h3>
     		                            <ul class="footer-address">
     		                                <li>
     		                                    <i class="fas fa-map-marker-alt"></i>
     		                                    <p>162, Queen Street
     		                                        Richmond
     		                                        Nelson
     		                                        New Zealand 
     		                                        7020</p>
     		                                </li>
     		                                <li>
     		                                    <i class="fas fa-envelope"></i>
     		                                    <p>support@immiyami.com</p>
     		                                </li>
     		                                <!-- <li>
                                            <i class="fas fa-phone-alt"></i>
                                            <p>00642041373313</p>
                                        </li> -->
     		                            </ul>
     		                        </div>
     		                    </div>
     		                    <div class="col-sm-6 col-md-6 col-lg-2">
     		                        <div class="footer-content">
     		                            <h3>Quick Links</h3>
     		                            <ul class="footer-widget">
     		                                <li><a href="/pages/faq">FAQ</a></li>
     		                                <?php

                                        if($Auth){
                                            if($Auth->role == 'member'){
                                                $myAccUrl = '/memberProfile';
                                            }else if($Auth->role == 'supplier'){
                                                $myAccUrl = '/supplierProfile';
                                            }else{
                                                $myAccUrl = '/users/dashboard';
                                            }
                                        }else{
                                            $myAccUrl = '/Users/login';
                                        }

                                        ?>
     		                                <li><a href="<?=$myAccUrl;?>">My Account</a></li>
     		                            </ul>
     		                        </div>
     		                    </div>
     		                    <div class="col-sm-6 col-md-6 col-lg-2">
     		                        <div class="footer-content">
     		                            <h3>Information</h3>
     		                            <ul class="footer-widget">
     		                                <li><a href="/pages/about">About Us</a></li>
     		                                <li><a href="/pages/contact">Contact Us</a></li>
     		                                <li><a href="/pages/membership">Membership</a></li>
     		                                <li><a href="/pages/articles">News</a></li>

     		                            </ul>
     		                        </div>
     		                    </div>
     		                    <!-- <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="footer-info">
                                    <a href="#"><img src="/front/images/logo.png" alt="logo"></a>
                                    <ul class="footer-count">
                                        <li>
                                            <h5><?=@$tUsers;?></h5>
                                            <p>Registered Users</p>
                                        </li>
                                        <li>
                                            <h5><?=@$tPosts;?></h5>
                                            <p>Community Ads</p>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
     		                </div>
     		            </div>
     		        </div>
     		    </div>
     		    <div class="footer-end">
     		        <div class="container">
     		            <div class="footer-end-content">
     		                <p>Copyright © <?=date('Y');?> ImmiYami All rights reserved </p>
     		                <!-- <p>All Copyrights Reserved &copy;  - Developed by <a href="#">Conscience</a></p> -->
     		                <ul class="footer-social terms-p">
     		                    <li><a href="/pages/terms-conditions" target="_blank">Terms</a></li>
     		                    <li><a href="/pages/privacy-policy" target="_blank">Privacy</a></li>
     		                    <li><a href="#">Cookies</a></li>

     		                </ul>
     		                <ul class="footer-social">
     		                    <li><a href="https://www.facebook.com/Immiyami"><i class="fab fa-facebook-f"></i></a></li>
     		                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
     		                    <!-- <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li> -->
     		                    <!--
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
-->
     		                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
     		                    <!--
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
-->
     		                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
     		                    <!--
                            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
-->
     		                </ul>
     		            </div>
     		        </div>
     		    </div>
     		</footer>
     		<!--=====================================
                    FOOTER PART END
        =======================================-->
     		<!-- video popup frame -->
     		<div class="video-po">
     		    <div class="video-popup">
     		        <div class="iframe-wrapper">
     		            <iframe class="responsive-iframe" src="" frameborder="0"
     		                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
     		                allowfullscreen></iframe>
     		            <span class="close-video"><i class="fa fa-window-close"></i></span>
     		        </div>
     		    </div>
     		</div>
     		<div class="modal fade p-video-model" id="pVideoModel" tabindex="-1" role="dialog" aria-labelledby=""
     		    aria-hidden="true">
     		    <div class="modal-dialog modal-dialog-centered" role="document">
     		        <div class="modal-content">
     		            <div class="modal-header">
     		                <h5 class="modal-title" id="exampleModalLongTitle">Premium Video</h5>
     		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     		                    <span aria-hidden="true">&times;</span>
     		                </button>
     		            </div>
     		            <div class="modal-body">
     		                This is a premium video please upgade/register with premium package.
     		            </div>
     		            <div class="modal-footer">
     		                <a href="/pages/membership"><button type="button" class="btn btn-primary">Watch Now</button></a>
     		            </div>
     		        </div>
     		    </div>
     		</div>

     		<!-- Back to top button -->
     		<button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
     		    <i class="fas fa-arrow-up"></i>
     		</button>

     		<!--=====================================
                    JS LINK PART START
        =======================================-->
     		<!-- VENDOR -->
     		<script src="/front/js/vendor/jquery-1.12.4.min.js"></script>
     		<script src="/front/js/vendor/popper.min.js"></script>
     		<script src="/front/js/vendor/bootstrap.min.js"></script>
     		<script src="/front/js/vendor/slick.min.js"></script>
     		<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
     		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"
     		    type="text/javascript"></script>
     		<script src="/backend/vendor/ckeditor/ckeditor.js"></script>

     		<!-- CUSTOM -->

     		<script src="/backend/vendor/select2/js/select2.full.min.js"></script>
     		<script src="/front/js/readmore.js"></script>
     		<script src="/front/js/waitMe.js"></script>
     		<script src="/front/js/jquery.quiz.js"></script>
     		<script src="/front/js/custom/slick.js"></script>
     		<script src="/front/js/custom/main.js"></script>
     		<!--=====================================
                    JS LINK PART END
        =======================================-->




     		<script>
			$(document).ready(function() {
    $('#countryId2').select2({
		placeholder: "Select Your Service Countries",
	});
});
$('.container-fluid,footer').on('click', function() {
    //$('.header-item .dropdown-card').hide();
    var d = $('.header-item .dropdown-card').css('display');
    console.log(d);
    if (d == 'block') {
        $('.header-item .dropdown-card').css('display', 'none');
    }
});


$(document).ready(function() {
    ClassicEditor
        .create(document.querySelector( '#descriptionSet' ), {

            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });
ClassicEditor
        .create(document.querySelector( '#description' ), {

            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });
});
$(document).ready(function() {


    $('#dataTable').DataTable({
        "searching": false,
        "paging": true,
        "ordering": false,
    }); <?
    if (@$memberToQ == '1') {
        ?>
        // $('#QueModal').modal('show');
        $('#QueModal').modal({
            backdrop: 'static',
            keyboard: false
        });

        <?
    } ?>
});
$(document).ready(function() {

    //========================================
    //    AD RIGHT BOTTOM SLIDER
    //========================================
    $('.right-bottom-add-slider').slick({
        dots: false,
        infinite: true,
        speed: 1500,
        autoplaySpeed: <?=@$settings_set['right-bottom-ad-slider']?>,
        autoplay: true,
        arrows: false,
        fade: false,
        slidesToShow: 1,
        mobileFirst: true,
        slidesToScroll: 1,
        prevArrow: '<i class="fas fa-long-arrow-alt-right dandik"></i>',
        nextArrow: '<i class="fas fa-long-arrow-alt-left bamdik"></i>',
        responsive: [

        ]
    });

    //========================================
    //    AD RIGHT TOP SLIDER
    //========================================
    $('.right-top-add-slider').slick({
        dots: false,
        infinite: true,
        speed: 1500,
        autoplaySpeed: <?=@$settings_set['right-top-ad-slider']?>,
        autoplay: true,
        arrows: false,
        fade: false,
        slidesToShow: 1,
        mobileFirst: true,
        slidesToScroll: 1,
        prevArrow: '<i class="fas fa-long-arrow-alt-right dandik"></i>',
        nextArrow: '<i class="fas fa-long-arrow-alt-left bamdik"></i>',
        responsive: [

        ]
    });

    //========================================
    //    AD LEFT BOTTOM SLIDER
    //========================================
    $('.left-bottom-add-slider').slick({
        dots: false,
        infinite: true,
        speed: 1500,
        autoplaySpeed: <?=@$settings_set['left-bottom-ad-slider']?>,
        autoplay: true,
        arrows: false,
        fade: false,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<i class="fas fa-long-arrow-alt-right dandik"></i>',
        nextArrow: '<i class="fas fa-long-arrow-alt-left bamdik"></i>',
        responsive: [

        ]
    });
    //========================================
    //    AD LEFT TOP SLIDER
    //========================================
    $('.left-top-add-slider').slick({
        dots: false,
        infinite: true,
        speed: 1500,
        autoplaySpeed: <?=@$settings_set['left-top-ad-slider']?>,
        autoplay: true,
        arrows: false,
        fade: false,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<i class="fas fa-long-arrow-alt-right dandik"></i>',
        nextArrow: '<i class="fas fa-long-arrow-alt-left bamdik"></i>',
        responsive: [

        ]
    });

    //========================================
    //    AD TOP SLIDER
    //========================================
    $('.top-add-slider').slick({
        dots: false,
        infinite: true,
        speed: 1500,
        autoplaySpeed: <?=@$settings_set['top-ad-slider']?>,
        autoplay: true,
        arrows: false,
        fade: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        mobileFirst: true,
        prevArrow: '<i class="fas fa-long-arrow-alt-right dandik"></i>',
        nextArrow: '<i class="fas fa-long-arrow-alt-left bamdik"></i>',
        responsive: [

        ]
    });

});

//coupan apply Section
$(document).ready(function() {
    $('.multiselect').select2();
    $('#couponBtn').on('click', function(e) {

        var code = $('#couponCode').val();
        var token = $("meta[name='ImmiToken']").attr("content");
        $.ajax({
            headers: {
                'X-CSRF-Token': token
            },
            type: "POST",
            data: {
                code: code
            },
            url: "/Coupons/addCoupon/",
            success: function(response) {
                // console.log(response);
                var arr = $.parseJSON(response);
                // console.log(arr);
                if (arr.status == '1') {
                    $('.couponAdd #couponCode').css('border', '2px solid #1ae51a')
                    $('.copResp p').text(arr.msg + ' You Have $' + arr.price + ' Coupon.')
                    $('.copResp p').css('color', 'green')
                } else {
                    $('.couponAdd #couponCode').css('border', '2px solid red')
                    $('.copResp p').css('color', 'red')
                    $('.copResp p').text(arr.msg)
                }

            }
        });

    });
});
     		</script>
     		<? if($Offer50){ ?>
     		<script>
// Set the date we're counting down to
// 1. JavaScript
// var countDownDate = new Date("Sep 5, 2018 15:37:25").getTime();
// 2. PHP
var countDownDate = <?php echo strtotime($stopDateOffer) ?> * 1000;
var now = <?php echo time() ?> * 1000;

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    // 1. JavaScript
    // var now = new Date().getTime();
    // 2. PHP
    now = now + 1000;

    // Find the distance between now an the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
    if (hours < 10) {
        hours = hours.toString().padStart(2, '0');
    }
    if (minutes < 10) {
        minutes = minutes.toString().padStart(2, '0');
    }
    if (seconds < 10) {
        seconds = seconds.toString().padStart(2, '0');
    }

    document.getElementById("Thours").innerHTML = hours;
    document.getElementById("Tminutes").innerHTML = minutes;
    document.getElementById("Tseconds").innerHTML = seconds;


    // If the count down is over, write some text 
    // if (distance < 0) {
    //     clearInterval(x);
    //     document.getElementById("demo").innerHTML = "EXPIRED";
    // }
}, 1000);
     		</script>
     		<?}
    ?>


     		<? if($page == 'upgrade'){ ?>
     		<? if($Offer50UserActive){ ?>
     		<script>
$(function() {
    $('#couponBtn').click();
});
     		</script>
     		<?}
    }
    ?>
     		<? if($page == 'feesibility'){ echo $this->element('feesibility_data');} ?>