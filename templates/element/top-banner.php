

        <!--=====================================
                    BANNER PART START
        =======================================-->
        <section class="banner-part home-banner-img pointer"  onclick="window.location.href='/feesibility'">
            <div class="container">
                <div class="banner-content ">
                    <h1>Welcome to ImmiYami</h1>
                    <p>We're delighted to provide you with a seamless and attractive one-stop solution for all your immigration needs. Our personalized services are accessible on a unique platform that caters to individuals from all walks of life pursuing a new beginning.</p>

                    <?php

                    if($Auth->role == 'supplier'){
                    ?>
<a href="#" class="">
                        <!--
                                                <i class="fas fa-eye"></i>
                        -->

                    </a>
                    <?php
                    }else{ ?>
                        <a href="/feesibility" class="btn btn-outline">
                        <!--
                                                <i class="fas fa-eye"></i>
                        -->
                        <i class="fas fa-plus-circle"></i>
                        <span>Eligibility Check</span>
                    </a>

                <?php    }
                ?>

                </div>
            </div>
        </section>

        <!--=====================================
                    BANNER PART END
        =======================================-->

