<!-- recommendation content -->

<section class="main payment-content paymentFaield">
    <div class="container ">
        <div class="row">
            <div class="col-md-6 col-xs-12 text-center">
            <div class="card">
                <div class="paymentC">
                    <i class="checkmark">✕</i>
                </div>
                    <h3>Payment Failed</h3>
                    <hr>
                    <p>Transaction Number : <b><?=$payment->txn_id?></b></p>
                    <p>Transaction Date : <b><?=$payment->payment_date?></b></p>
                    <p>Sorry Some thing wrong;<br/> Please try again shortly!</p>
                    <hr>
                    <a href="/" class="btn btn-outline">Go Back</a>
                </div>
            </div>
            <div class="col-md-6 col-xs-12 payment-img">

                <img src="/front/images/failed.png" class="pimg"/>
            </div>
        </div>

    </div>

</section>
