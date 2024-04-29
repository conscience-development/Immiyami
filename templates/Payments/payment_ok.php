<!-- recommendation content -->

<section class="main payment-content paymentOk">
    <div class="container ">
        <div class="row">
            <div class="col-md-6 col-xs-12 text-center">
            <div class="card">
                <div class="paymentC">
                    <i class="checkmark">✓</i>
                </div>
                    <h3>Payment Success</h3>
                    <hr>
                    <p>Transaction Number : <b><?=$payment->txn_id?></b></p>
                    <p>Transaction Date : <b><?=$payment->payment_date?></b></p>
                    <p class="color-red mt-2"><b>PLEASE KEET TRANSACTION NUMBER</b></p>
                    <? if($userRole == 'member'){

                        $link = '/memberProfile';
                        ?>
                        <!-- <p>Your account has been successfully created. <br/>please verify your email and login. <br/>Link will expire in 24 hours!.</p> -->
                    <? }else{
                        $link = '/supplierProfile';
                        ?>
                        <p>We received your purchase request;<br/> we'll be in touch shortly!</p>
                    <? } ?>

                    <hr>
                    <a href="<?=$link;?>" class="btn btn-outline">Go To Profile</a>
                </div>
            </div>
            <div class="col-md-6 col-xs-12 payment-img">

                <img src="/front/images/ok.png" class="pimg"/>
            </div>
        </div>

    </div>

</section>
