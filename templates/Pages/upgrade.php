<!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
<section class="single-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content">
                    <h2>Upgrade</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Upgrade</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================
                  SINGLE BANNER PART END
        =======================================-->


<section class="upgrade-part help">
    <div class="container">
        <div class="row">
            <div class="col-lg-12"><br><br>
                <div class="table-scroll">
                    <table class="table-list">
                        <thead class="table-head">
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <!-- <th scope="col">Action</th> -->
                            </tr>
                        </thead>
                        <tbody class="table-body">
                            <? if($package == 'gold'){?>
                            <tr>
                                <td class="table-product">
                                    <h6><a href="#">GOLD PLAN</a></h6>
                                </td>
                                <td class="table-price">
                                    <h5>$8.99</h5>
                                </td>

                                <!-- <td class="table-action">
                                    <a href="/pages/membership" >
                                        <button type="button" title="Delete" class="icon wish fas fa-trash"></button>
                                    </a>
                                </td> -->
                            </tr>
                            <?}else{?>
                                <tr>
                                <td class="table-product">
                                    <h6><a href="#">PLATINUM PLAN</a></h6>
                                </td>
                                <td class="table-price">
                                    <h5>$18.99</h5>
                                </td>

                                <!-- <td class="table-action">
                                    <a href="/pages/membership" >
                                        <button type="button" title="Delete" class="icon wish fas fa-trash"></button>
                                    </a>
                                </td> -->
                            </tr>
                            <?}?>
                        </tbody>
                    </table>
                </div>
                <hr>

                <?= $this->Form->create(NULL,['action'=>'/Payments/Pay/'.@$Auth->id.'/upgrade']) ?>
                <div class="couponAdd">
                    <div class="card mb-3">
                        <div class="card-body">
                                <div class="form-group"> <label>Have coupon?</label>
                                    <div class="input-group">
                                        <input type="hidden" class="form-control coupon" name="package" value="<?=$package;?>">
                                        <?
                                        if($Offer50UserActive){
                                            $cCode = $CodeOffer;
                                        }else{
                                            $cCode = '';
                                        }
                                        ?>
                                        <input type="text" class="form-control coupon" id="couponCode" <? if(!empty($cCode)){echo "readonly";}?> value="<?=$cCode;?>" name="coupon" placeholder="Coupon code">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-inline btn-apply coupon" id="couponBtn">Apply</button>
                                        </span>
                                    </div>
                                    <div class="copResp">
                                        <p></p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="compare-btn center-50">
                    <button type="submit" class="btn btn-inline btn-apply coupon">Pay Now</button>


                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
    </div>
