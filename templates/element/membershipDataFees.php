<div class="row feesib justify-content-center">
    <div class="col-md-6 col-lg-4">
        <div class="price-card free">
            <div class="price-head">
                <!-- <i class="flaticon-bicycle"></i> -->
                <h3>$00 </h3>
            </div>

            <h4>Free Plan <br></h4>
            <ul class="price-list">
                <li>
                    <i class="fas fa-plus"></i>
                    <p>Classified Access</p>
                </li>
                <li>
                    <i class="fas fa-plus"></i>
                    <p>Immigration agents </p>
                </li>
                <!--
                                <li>
                                    <i class="fas fa-plus"></i>
                                    <p>No Top or Featured Ad</p>
                                </li>
                                <li>
                                    <i class="fas fa-plus"></i>
                                    <p>No Ad will be bumped up</p>
                                </li>
                                -->
                <li>
                    <i class="fas fa-plus"></i>
                    <p>IELTS classes</p>

                </li>
                <li>
                    <i class="fas fa-plus"></i>
                    <p>Visa check list</p>

                </li>
            </ul>
            <div class="price-btn">
                <? if(empty($Auth->id)){ ?>
                <a href="/Users/login?type=register&package=free" class="member-learn-more">
                    <span>Learn more</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
                <?}?>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="price-card price-active gold">
            <div class="price-head">
                <!-- <i class="flaticon-car-wash"></i> -->
                <h3>$8.99</h3>
            </div>
            <h4>Gold Plan <br></h4>
            <ul class="price-list readmore">
                <li>
                    <i class="fas fa-plus"></i>
                    <p>Mock visa Interviews</p>
                </li>


                <li>
                    <i class="fas fa-plus"></i>
                    <p>Job seekers websites</p>
                </li>
                <li>
                    <i class="fas fa-plus"></i>
                    <p>Vehicle sales and business sales websites</p>
                </li>
                <li>
                    <i class="fas fa-plus"></i>
                    <p>House rent and room rental sites</p>
                </li>
                <!-- <li>
                                    <i class="fas fa-plus"></i>
                                    <p>Job search sites (Respective countries)</p>
                                </li>
                                <li>
                                    <i class="fas fa-plus"></i>
                                    <p>Real estate sites (house rental)</p>
                                </li>
                                <li>
                                    <i class="fas fa-plus"></i>
                                    <p>Vehicle sales sites</p>
                                </li>
                                <li>
                                    <i class="fas fa-plus"></i>
                                    <p>Investor migration requirements</p>
                                </li>
                                <li>
                                    <i class="fas fa-plus"></i>
                                    <p>Businesses for sale web sites</p>
                                </li>
                                <li>
                                    <i class="fas fa-plus"></i>
                                    <p>Bank and TB Rates</p>
                                </li>
                                <li>
                                    <i class="fas fa-plus"></i>
                                    <p>Immigration agents for investor migration </p>
                                </li>
                                <li>
                                    <i class="fas fa-plus"></i>
                                    <p>Basic Support</p>
                                </li> -->
            </ul>
            <div class="price-btn">
                <? if(empty($Auth->id)){ ?>
                <a href="/Users/login?type=register&package=gold" class="member-learn-more">
                    <span>Learn more</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
                <?}else{?>
                <?
                                    if(@$Auth->payments[count($Auth->payments) - 1]->package == 'free' || @$Auth->payments[count($Auth->payments) - 1]->status == '0'){
                                        if($Auth->role == 'member'){
                                            ?>
                <a href="/pages/upgrade?package=gold" class="member-learn-more">
                    <span>Learn more</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
                <?}}?>
                <?}?>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 d-none">
        <div class="price-card platinum">
            <div class="price-head">
                <!-- <i class="flaticon-airplane"></i> -->
                <h3>$18.99 </h3>
            </div>
            <h4>Platinum Plan <br></h4>
            <ul class="price-list mt-1">
                <li>
                    <i class="fas fa-plus"></i>
                    <p>Gold +</p>
                </li>
                <li>
                    <i class="fas fa-plus"></i>
                    <p>Recommend for Business and Employment migrant</p>
                </li>
                <li>
                    <i class="fas fa-plus"></i>
                    <p>10 Minutes call with an immigration advisor. </p>
                </li>
                <!--
                                <li>
                                    <i class="fas fa-plus"></i>
                                    <p>Ad Top Category</p>
                                </li>
-->

                <li>
                    <i class="fas fa-plus"></i>
                    <p>Priority Support</p>
                </li>
            </ul>
            <div class="price-btn">
                <? if(empty($Auth->id)){ ?>
                <a href="/Users/login?type=register&package=platinum" class="member-learn-more">
                    <span>Learn more</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
                <?}else{?>
                <?
                                    if($Auth->role == 'member'){
                                    if(@$Auth->payments[count($Auth->payments) - 1]->package != 'platinum'  || @$Auth->payments[count($Auth->payments) - 1]->status == '0'){?>
                <a href="/pages/upgrade?package=platinum" class="member-learn-more">
                    <span>Learn more</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
                <?}}?>
                <?}?>
            </div>
        </div>
    </div>
</div>