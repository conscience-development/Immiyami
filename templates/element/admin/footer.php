<!-- Required vendors -->
<script src="/backend/vendor/global/global.min.js"></script>

<script src="/backend/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

<!-- Apex Chart -->

<!--
	<script src="/backend/vendor/apexchart/apexchart.js"></script>
-->


<!-- Chart piety plugin files -->


<!-- Dashboard 1 -->
<!--
	<script src="/backend/js/dashboard/dashboard-1.js"></script>
-->

<script src="/backend/vendor/owl-carousel/owl.carousel.js"></script>
<script src="/backend/vendor/bootstrap-datetimepicker/js/moment.js"></script>
<script src="/backend/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<!-- Datatable -->
<script src="/backend/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="/backend/js/plugins-init/datatables.init.js"></script>
<!-- Daterangepicker -->
<!-- momment js is must -->
<script src="/backend/vendor/moment/moment.min.js"></script>
<script src="/backend/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- clockpicker -->
<script src="/backend/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<script src="/backend/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="/backend/vendor/ckeditor/ckeditor.js"></script>
<script src="/backend/js/dlabnav-init.js"></script>
<script src="/backend/js/pickadate-init.js"></script>
<script src="/backend/vendor/select2/js/select2.full.min.js"></script>

<script src="/backend/vendor/multi/jquery.multi-select.js"></script>
<script src="/backend/js/plugins-init/select2-init.js"></script>
<script src="/backend/js/waitMe.js"></script>
<script src="/backend/js/custom.js"></script>
<script src="/backend/js/demo.js"></script>

<script>
$(function() {
    //~ $('form .align-right .btn-primary').click(function(){
    //~ alert('s');
    //~ $('.form-validation').waitMe();
    //~ });
    $('#backbtn').click(function() {
        history.back()
    });
    $(document).on('submit', '.card-body form', function(e) {
        //~ e.preventDefault(); // cancel default submit
        //~ alert('s');
        $('.form-validation').waitMe({
            effect: 'stretch',
            color: '#e23428'
        });
    });
});

function TravlCarousel() {

    /*  testimonial one function by = owl.carousel.js */
    jQuery('.front-view-slider').owlCarousel({
        loop: false,
        margin: 15,
        nav: true,
        autoplaySpeed: 3000,
        navSpeed: 3000,
        paginationSpeed: 3000,
        slideSpeed: 3000,
        smartSpeed: 3000,
        autoplay: false,
        animateOut: 'fadeOut',
        dots: true,
        navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
        responsive: {
            0: {
                items: 1
            },

            768: {
                items: 2
            },

            1400: {
                items: 2
            },
            1600: {
                items: 3
            },
            1750: {
                items: 3
            }
        }
    })
}

jQuery(window).on('load', function() {
    setTimeout(function() {
        TravlCarousel();
    }, 1000);
});
</script>
<script>
$(function() {
    $('#datetimepicker').datetimepicker({
        inline: true,
    });


});

$(document).ready(function() {
    $(".booking-calender .fa.fa-clock-o").removeClass(this);
    $(".booking-calender .fa.fa-clock-o").addClass('fa-clock');
});
</script>
<script>
$(function() {

    var idList = [];

    $("body").on("click", ".checkbox_check_ind", function() {
        if ($(this).is(':checked')) {
            idList.push($(this).attr('val_id'));
            //~ alert(idList);
        } else {
            removeItem = $(this).attr('val_id');
            idList = jQuery.grep(idList, function(value) {
                return value != removeItem;
            });
            //~ alert(idList);
        }
    });

    $('#multiAction').click(function() {

        //~ alert(idList);
        let textConfirm = "Are you sure you want to do this action? This can't be undone.";
        if (confirm(textConfirm) == true) {
            $('body').waitMe({
                effect: 'stretch'
            });
            var statusGet = $('.bulk_actions #status').val();
            if (idList.length === 0) {
                //~ http://immiyami.mylap/Articles?q=holiday
                window.location.href = "/<?=$controller;?>/<?=$controller_action;?>?q=status-" +
                    statusGet;
            } else {
                //send data
                var token = $("meta[name='ImmiToken']").attr("content");
                $.ajax({
                    headers: {
                        'X-CSRF-Token': token
                    },
                    type: "POST",
                    data: {
                        info: idList,
                        status: statusGet
                    },
                    url: "/<?=$controller;?>/multiAction",
                    success: function(msg) {
                        //~ console.log(msg);

                        location.reload();
                    }
                });
            }
        } else {

        }


    });
    $('#form-select').multiSelect();

    $('#select-all').click(function() {
        $('#form-select').multiSelect('select_all');
        return false;
    });
    $('#deselect-all').click(function() {
        $('#form-select').multiSelect('deselect_all');
        return false;
    });

    //~ $('input[type="checkbox"]').click(function(){
    $('input[type="checkbox"]').on('ifChecked', function(event) {

        var participater = $(this).val();
        var event = $(this).attr('event');
        var comp = $(this).attr('comp');
        var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;

        $.ajax({
            headers: {
                'X-CSRF-Token': csrfToken
            },
            type: "POST",
            data: {
                event_id: event,
                status: '1',
                company_id: comp,
                participant_id: participater
            },
            url: "/attendances/addMarkAttendances/",
            success: function(response) {
                console.log(response);

            }
        });


    });
});

$(document).ready(function() {
    $('form').find("input[type=textarea], textarea").each(function(ev) {
        var name = $(this).attr('name')
        //~ if(!$(this).val()) {
        var txt = "Type " + name.replace(/[^a-z0-9\s]/gi, ' ').replace(/[_\s]/g, ' ') + " here"
        $(this).attr("placeholder", txt);
        //~ }
    });
    $('form').find("input[type=text]").each(function(ev) {
        var name = $(this).attr('name')
        //~ console.log
        if (name != 'q') {
            var txt = "Type " + name.replace(/[^a-z0-9\s]/gi, ' ').replace(/[_\s]/g, ' ') +
                " here (Max characters 255)"
            $(this).attr("placeholder", txt);
        }
    });

    $('.daterangepick').daterangepicker();
});
</script>