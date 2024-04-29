
<?
use Cake\ORM\TableRegistry;
?>
<!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
<section class="single-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content">
                    <h2><?= $post->title ?></h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/list-posts">ad-list</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $post->title ?></li>
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
                    AD DETAILS PART START
        =======================================-->
<section class="inner-section ad-details-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- AD DETAILS CARD -->
                <div class="common-card">
                    <ol class="breadcrumb ad-details-breadcrumb">
                        <?

                        foreach ($post->posts_categories as $k => $catL) {
                            if ($k < 6) {
                                ?>
                                <li><span class="flat-badge sale"><?= @$catL->category->name; ?></span></li>
                            <? }
                        } ?>
                    </ol>
                    <h5 class="ad-details-address">


                        <?= @$post->user->country->name; ?>
                    </h5>
                    <h3 class="ad-details-title"><?= $post->title ?></h3>
                    <div class="ad-details-meta">
                        <!--
                                <a class="view">
                                    <i class="fas fa-eye"></i>
                                    <span><strong>(134)</strong>preview</span>
                                </a>
-->
                        <!-- <a class="click">
                                    <i class="fas fa-mouse"></i>
                                    <span><strong>(<?= $post->clicks ?>)</strong>click</span>
                                </a>
                                <a href="#review" class="rating">
                                    <i class="fas fa-star"></i>
                                    <span><strong>(29)</strong>stars</span>
                                </a> -->
                    </div>

                    
                        <div class="ad-details-slider-group">
                            <div class="ad-details-slider slider-arrow">
                                <? foreach ($post->post_images as $imgs) { ?>
                                    <a href="<?= $post->url; ?>" target="_blank"> 
                                    <div>
                                        <img src="/files/postimages/photo/<?= $imgs->photo_dir; ?>/<?= $imgs->photo; ?>" alt="details">
                                    </div>
                                    </a>

                                <? } ?>
                            </div>
                        </div>
                        
                            <div class="ad-thumb-slider">
                                <? foreach ($post->post_images as $imgs) { ?>
                                    <div><img src="/files/postimages/photo/<?= $imgs->photo_dir; ?>/<?= $imgs->photo; ?>"
                                            alt="details">
                                    </div>

                                <? } ?>
                            </div>
                </div>

                <!-- SPECIFICATION CARD -->


                <!-- DESCRIPTION CARD -->
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">description</h5>
                    </div>
                    <p class="ad-details-desc">
                        <?= $post->description; ?>
                    </p>
                </div>

            </div>
            <div class="col-lg-4">

                <!-- PRICE CARD -->
                <?php

                if (@$Auth->role == 'supplier' && $post->user_id == $Auth->id) {

                    if ($post->c_status == '1') {
                        ?>
                        <button type="button" class="common-card btn btn-inline edit-p-btn"
                            onClick="location.href = '/supplierProfile?post-id=<?= $post->id; ?>#edit-post';">
                            <h3>Edit Ad. <i class="fas fa-pencil-alt"></i></h3>
                        </button>
                    <?php }
                }
                ?>


                <!-- PRICE CARD -->
                <button type="button" class="common-card price" data-toggle="modal" data-target="#email">
                    <h3>
                        <?php
                        echo substr($post->user->email, 0, 3) . "...@mail.com";
                        ?><span>Click to show</span>
                    </h3>
                    <i class="fas fa-envelope"></i>
                </button>

                <!-- NUMBER CARD -->
                <button type="button" class="common-card number" data-toggle="modal" data-target="#number">
                    <h3>(
                        <?php
                        echo substr($post->user->contact, 0, 3) . "xxxxxxx";
                        ?>)<span>Click to show</span>
                    </h3>
                    <i class="fas fa-phone"></i>
                </button>

                <!-- AUTHOR CARD -->
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">author info</h5>
                    </div>
                    <div class="ad-details-author">
                        <!-- <a href="/supplierProfileView/<?= preg_replace('/[^\da-z]/i', '-', $post->user->first_name . '-' . $post->user->last_name); ?>-<?= $post->user->id ?>" class="author-img active"> -->
                        <? if (!empty($post->user->photo)) { ?>
                            <img src="/files/users/photo/<?= $post->user->photo_dir; ?>/square_<?= $post->user->photo; ?>"
                                alt="<? ?>">
                        <? } else { ?>
                            <img src="/front/images/avatar/01.jpg" alt="avatar">
                        <? } ?>
                        <!-- </a> -->
                        <div class="author-meta">
                                <?
                                    $this->Users11 = TableRegistry::get('Users');
                                    $user11 = $this->Users11->get($post->user_id);
                                    $userName = $user11->first_name." ".$user11->last_name;
                                ?>
                            <?if($post->user->first_name == null):?>
                                <?
                                    $this->Users11 = TableRegistry::get('Users');
                                    $user11 = $this->Users11->get($post->user_id);
                                    $userName = $user11->first_name." ".$user11->last_name;
                                ?>
                                <h4><?=h($userName)?></h4>
                            <?endif?>
                            <h4>
                                <!-- <a href="/supplierProfileView/<?= preg_replace('/[^\da-z]/i', '-', $post->user->first_name . '-' . $post->user->last_name); ?>-<?= $post->user->id ?>"> -->
                                <?= $post->user->first_name . ' ' . $post->user->last_name; ?>
                                <!-- </a> -->
                            </h4>
                            <h5>joined:
                                <?php
                                $date = date_create($post->user->created);
                                echo date_format($date, "jS \of F Y"); ?>
                            </h5>
                            <p><?= $post->user->bio; ?></p>
                        </div>
                        <div class="author-widget">
                            <!-- <a href="/supplierProfileView/<?= preg_replace('/[^\da-z]/i', '-', $post->user->first_name . '-' . $post->user->last_name); ?>-<?= $post->user->id ?>" title="Profile" class="fas fa-eye"></a> -->
                            <!-- <button type="button" title="Email" class="fas fa-envelope" data-toggle="modal"
                                data-target="#email"></button> -->
                            <!-- <button type="button" title="Number" class="fas fa-phone" data-toggle="modal"
                                data-target="#number"></button> -->

                        </div>
                        <!-- <ul class="author-list">
                                    <li><h6>total ads</h6><p><?//=count($post->user->posts) ?></p></li>
                                    <li><h6>total clicks</h6><p>78</p></li>
                                    <li><h6>total stars</h6><p>56</p></li>
                                </ul> -->
                    </div>
                </div>



                <!-- SAFETY CARD -->
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">Specification</h5>
                    </div>
                    <ul class="ad-details-specific">
                        <li>
                            <h6>Categories:</h6>
                            <?

                            foreach ($post->posts_categories as $k => $catL) {
                                if ($k < 6) {
                                    ?>
                                    <span class="flat-badge rent"><?= @$catL->category->name; ?></span>
                                <? }
                            } ?>
                        </li>
                        <li>
                            <h6>Countries:</h6>
                            <?

                            foreach ($post->posts_countries as $k => $catL) {
                                if ($k < 6) {
                                    ?>
                                    <span class="flat-badge rent"><?= @$catL->country->name; ?></span>
                                <? }
                            } ?>
                        </li>
                        <li>
                            <h6>Approved Date:</h6>
                            <p>
                                <?
                                if (!empty($post->approved_date)) {
                                    $date = date_create($post->approved_date);
                                    echo date('Y/m/d',strtotime($post->approved_date));
                                } ?>
                            </p>
                        </li>
                    </ul>
                </div>
                <!-- <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">Tips for Advertisements</h5>
                    </div>
                    <div class="ad-details-safety">
                        <p>Use descriptive language</p>
                        <p>Use sensory details</p>
                        <p>Use figurative language</p>
                        <p>Use specific examples</p>
                        <p>Use active voice</p>
                        <p>Organize your description</p>
                        <p>Use appropriate tone</p>
                        <p>Use editing tools</p>
                    </div>
                </div> -->


            </div>
        </div>
    </div>
</section>
<!--=====================================
                    AD DETAILS PART END
        =======================================-->


<!--=====================================
                  email MODAL PART START
        =======================================-->
<div class="modal fade" id="email">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Contact this Email</h4>
                <button class="fas fa-times" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h3 class="modal-number"><?= $post->user->email; ?></h3>
            </div>
        </div>
    </div>
</div>
<!--=====================================
                  NUMBER MODAL PART END
        =======================================-->
<!--=====================================
                  NUMBER MODAL PART START
        =======================================-->
<div class="modal fade" id="number">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Contact this Number</h4>
                <button class="fas fa-times" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h3 class="modal-number"><?= $post->user->contact; ?></h3>
            </div>
        </div>
    </div>
</div>
<!--=====================================
                  NUMBER MODAL PART END
        =======================================-->