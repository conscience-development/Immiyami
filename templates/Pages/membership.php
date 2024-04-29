<!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
<section class="single-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content">
                    <h2>Membership</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Membership</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================
                  SINGLE BANNER PART END
        =======================================-->


<!--=====================================
                     PRICE PART START
        =======================================-->
<section class="price-part mt-0 full-width-with-cont">
    <div class="container">
        <?= $this->element('membershipDataFeesRed') ?>

        <?php

                                if($Auth){
                                    if($Auth->role == 'member'){
                                        $myAccUrl = '#';
                                    }else if($Auth->role == 'supplier'){
                                        $myAccUrl = '/supplierProfile';?>
        <?
                                    }else{
                                        $myAccUrl = '/users/dashboard';
                                    }

                                    if($Auth->role == 'member'){}else{ ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>The membership that will take you one step
                        <br>closer to your overseas dream!
                    </h2>

                    <p>ImmiYami offers a membership plan designed to provide greater accessibility to a wider range of
                        options and extended services. While it is not mandatory to pay for membership, doing so can
                        bring you closer to realizing your dream of moving abroad.</p>

                    <p>By becoming a paid member, you gain access to an even greater wealth of information and
                        resources, allowing you to explore more opportunities and make more informed decisions about
                        your future. However, even with our free plan, you'll still be able to access a significant
                        amount of valuable information and support.</p>
                    <!-- <p>Right people at the Right time; Don’t miss this wonderful opportunity to impress your target market. Yes, most of them are visiting ImmiYami.</p> -->
                    <?php

                                if($Auth){
                                    if($Auth->role == 'member'){
                                        $myAccUrl = '#';
                                    }else if($Auth->role == 'supplier'){
                                        $myAccUrl = '/supplierProfile';
                                    }else{
                                        $myAccUrl = '/users/dashboard';
                                    }
                                }else{
                                    $myAccUrl = '/Users/login';
                                }

                                ?>
                    <a href="<?=$myAccUrl;?>" class="btn btn-outline">
                        <i class="fas fa-plus-circle"></i>
                        <span>post your ad</span>
                    </a>
                </div>
            </div>
        </div>
        <?php }
                                }else{?>

        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>The membership that will take you one step
                        <br>closer to your overseas dream!
                    </h2>

                    <p>ImmiYami offers a membership plan designed to provide greater accessibility to a wider range of
                        options and extended services. While it is not mandatory to pay for membership, doing so can
                        bring you closer to realizing your dream of moving abroad.</p>

                    <p>By becoming a paid member, you gain access to an even greater wealth of information and
                        resources, allowing you to explore more opportunities and make more informed decisions about
                        your future. However, even with our free plan, you'll still be able to access a significant
                        amount of valuable information and support.</p>
                    <!-- <p>Right people at the Right time; Don’t miss this wonderful opportunity to impress your target market. Yes, most of them are visiting ImmiYami.</p> -->
                    <?php

                                if($Auth){
                                    if($Auth->role == 'member'){
                                        $myAccUrl = '#';
                                        $pTest = 'post your ad';
                                    }else if($Auth->role == 'supplier'){
                                        $myAccUrl = '/supplierProfile';
                                        $pTest = 'post your ad';
                                    }else{
                                        $myAccUrl = '/users/dashboard';
                                        $pTest = 'post your ad';
                                    }
                                }else{
                                    $myAccUrl = '/Users/login?type=register&package=free';
                                    $pTest = 'Register Now';
                                }

                                ?>
                    <a href="<?=$myAccUrl;?>" class="btn btn-outline">
                        <i class="fas fa-plus-circle"></i>
                        <span><?=$pTest;?></span>
                    </a>
                </div>
            </div>
        </div>

        <?php } ?>
    </div>
</section>