<!--=====================================
                    HEADER PART START
        =======================================-->

<header class="header-part">
    <div class="top-header-sec 	d-none d-sm-block">
        <div class="container-fluid">
            <div class="btnset">
                <? if(empty($Auth->id)){ ?>
                <a href="/users/login" class="">
                    <i class="fa fa-user"></i>&nbsp;
                    <span>Login/Register</span>
                </a>&nbsp;&nbsp;<?=$Auth->first_name?>
                <?}else{?>
                <?php

                if($Auth->role == 'member'){
                    $profilered = 'memberProfile';
                }else if($Auth->role == 'supplier'){
                    $profilered = 'supplierProfile';
                }else{
                    $profilered = 'users/dashboard';
                }
                ?>
                <!-- <a href="<?=$profilered;?>" class="">
                    <i class="fa fa-user"></i>&nbsp;
                    <span><?=$Auth->first_name?></span>
                </a>&nbsp;&nbsp; -->
                <?}?>
                <a href="/pages/contact" class="">
                    <i class="fa fa-envelope"></i>&nbsp;
                    <span>Contact Us</span>
                </a>
            </div>
        </div>

    </div>
    <div class="container">

        <div class="header-content">
            <div class="header-left">
                <button type="button" class="header-widget sidebar-btn">
                    <i class="fas fa-align-left"></i>
                </button>
                <a href="/" class="header-logo">
                    <img src="/front/images/logo.png" alt="logo">
                </a>

                <a href="/list-posts">
                    <button type="button" class="header-widget search-btn">
                        <i class="fas fa-searchs">ADS</i>
                    </button>
                </a>
                <!-- <button type="button" class="header-widget search-btn">
                             <i class="fas fa-search"></i>
                        </button> -->
            </div>

            <div class="header-right">
                <ul class="header-list">
                    <li class="header-item"><a class="navbar-link" href="/">Home</a></li>
                    <li class="header-item"><a class="navbar-link" href="/pages/about">About Us</a></li>
                    <li class="header-item"><a class="navbar-link" href="/pages/membership">Membership</a></li>
                    <li class="header-item">

                        <button type="button" class="header-widget">

                            Supplier
                        </button>
                        <div class="dropdown-card suppl">

                            <ul class="action-list">
                                <li class="action-item active">

                                    <a href="/pages/post-add" class="notify-link">
                                        <div class="notify-content">
                                            <p class="notify-text">
                                                Information
                                            </p>

                                        </div>
                                    </a>
                                </li>

                                <li class="action-item">
                                    <a href="/Users/login?type=register&package=supplier" class="notify-link">
                                        <div class="notify-content">
                                            <p class="notify-text">
                                                Register Now
                                            </p>

                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="header-item"><a class="navbar-link" href="/pages/articles">News</a></li>
                    <!-- <li class="header-item"><a class="navbar-link" href="/pages/contact">Contact Us</a></li> -->
                    <!-- <li class="header-item"><a class="navbar-link" href="/pages/help">Help</a></li> -->


                    <? if(@$Auth->id){ ?>

                    <li class="header-item">
                        <button type="button" class="header-widget">
                            <?if(!empty($Auth->photo)){?>
                            <img src="/files/users/photo/<?=$Auth->photo_dir;?>/<?=$Auth->photo;?>"
                                class="top_bar_pro_img" alt="<?=$Auth->first_name;?>">
                            <?}else{?>
                            <img src="/front/images/avatar/01.jpg" alt="avatar" class="top_bar_pro_img">
                            <?}?>
                            &nbsp;<?=$Auth->first_name?>
                        </button>
                        <div class="dropdown-card">

                            <ul class="action-list">
                                <li class="action-item active">
                                    <?php

											 if($Auth->role == 'member'){
												 $profilered = 'memberProfile';
											 }else if($Auth->role == 'supplier'){
												 $profilered = 'supplierProfile';
											 }else{
												 $profilered = 'users/dashboard';
											 }
											?>
                                    <a href="/<?=$profilered;?>" class="notify-link">
                                        <div class="notify-content">
                                            <p class="notify-text">
                                                Dashboard
                                            </p>

                                        </div>
                                    </a>
                                </li>
                                <?
                                        // var_dump($Auth->payments[count($Auth->payments) - 1]->package);
                                        if($Auth->role == 'member'){
                                        if(@$Auth->payments[count($Auth->payments) - 1]->package != 'platinum' || @$Auth->payments[count($Auth->payments) - 1]->status == '0'){?>
                                <li class="action-item">
                                    <a href="/pages/membership" class="notify-link">
                                        <div class="notify-content">
                                            <p class="notify-text">
                                                Upgrade to premium <i class="fa fa-crown"></i>
                                            </p>

                                        </div>
                                    </a>
                                </li>
                                <? }} ?>
                                <li class="action-item">
                                    <a href="/users/logout" class="notify-link">
                                        <div class="notify-content">
                                            <p class="notify-text">
                                                Logout
                                            </p>

                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?}?>
                </ul>

                <? if(empty($Auth->id)){ ?>
                <!-- <a href="/users/login" class="header-widget header-user">
                    <img src="/front/images/user.png" alt="user">
                    <span>Login/Register</span>
                </a> -->
                <?}?>

                <!-- <a href="/list-posts" class="btn btn-inline post-btn">
                    <i class="fas fa-plus-circle"></i>
                    <span>Classified Ads</span>
                </a> -->

                <?php

                    if($Auth->role == 'supplier'){
                        $addp = '/supplierProfile';
                    }else{
                        $addp = '/pages/post-add';
                    }
                ?>
                <?
                if($Auth->role == 'member'){}else{
                ?>
                <a href="<?=$addp;?>" class="btn btn-inline header-sm-btn post-btn">
                    <i class="fas fa-plus-circle"></i>
                    <span>Post Your Ads</span>
                </a>
                <?}?>
                <a href="/list-posts" class="btn btn-inline post-btn header-sm-btn outline-only">
                    <i class="fas fa-plus-circle"></i>
                    <span>Classified Ads</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Add Offer Part -->
    <? if($Offer50){ ?>
    <? if(@$Auth->payments[count($Auth->payments) - 1]->package == 'free' || @$Auth->payments[count($Auth->payments) - 1]->status == '0'){ ?>
    <div class="topOfferPart">
        <?
                // Store a string into the variable which
                $user_string = $Auth->id.'-'.preg_replace('/[^\da-z ]/i', '', $Auth->first_name).preg_replace('/[^\da-z ]/i', '', $Auth->contact).preg_replace('/[^\da-z ]/i', '', $Auth->last_name);

                // Store the cipher method
                $ciphering = "AES-128-CTR";

                // Use OpenSSl Encryption method
                $iv_length = openssl_cipher_iv_length($ciphering);
                $options = 0;

                // Non-NULL Initialization Vector for encryption
                $encryption_iv = '1234567891011121';

                // Store the encryption key
                $encryption_key = "ImmiYamiOffer50Key";

                // Use openssl_encrypt() function to encrypt the data
                $encryption = openssl_encrypt($user_string, $ciphering,
                            $encryption_key, $options, $encryption_iv);

            ?>
        <p><b>Gold Plan</b> : You are eligible for a 50% discount on our Gold Plan. <a
                href="/pages/upgrade?package=gold&encryption=<?=$encryption;?>" class="btn">Get Gold Plan</a> <span
                id="Thours" class="btn timer">00</span> : <span id="Tminutes" class="btn timer">00</span> : <span
                id="Tseconds" class="btn timer">00</span></p>
    </div>
    <?}?>
    <?}?>
</header>
<!--=====================================
                    HEADER PART END
        =======================================-->

<style></style>