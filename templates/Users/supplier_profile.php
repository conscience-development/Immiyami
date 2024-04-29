<!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
<section class="single-banner dashboard-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content">
                    <h2>&nbsp;</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">supplier dashboard</li>
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
                DASHBOARD HEADER PART START
        =======================================-->
<? //var_dump($user->country);?>
<section class="dash-header-part">
    <div class="container">
        <div class="dash-header-card">
            <div class="row">
                <div class="col-lg-5">
                
                    <div class="dash-header-left">
                        
                        <div class="dash-avatar">
                            <a href="#">
                                <?if(!empty($user->photo)){?>
                                <img src="/files/users/photo/<?=$user->photo_dir;?>/<?=$user->photo;?>"
                                    alt="<?=$user->first_name;?>">
                                <?}else{?>
                                <img src="/front/images/avatar/01.jpg" alt="avatar">
                                <?}?>

                            </a>
                        </div>
                    
                        <div class="dash-intro">
                            <h4><a href="#"><?=$user->first_name.' '.$user->last_name;?></a></h4>
                            <h5 class="ucfirst">supplier</h5>
                            <ul class="dash-meta">
                                <li>
                                    <i class="fas fa-phone-alt"></i>
                                    <span><?=@$user->contact;?></span>
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <span><?=@$user->email;?></span>
                                </li>
                                <!-- <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span><?=@$user->country->name;?></span>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                
                </div>
                <div class="col-lg-7" >
                    <div class="dash-header-right" >
                        <div class="dash-focus dash-list" >
                            <h2><?=count($user->posts);?></h2>
                            <p>listing ads</p>
                        </div>
                        <div class="dash-focus dash-book">
                            <h2>
                                <?php
                                        $tc = 0;
                                        foreach($user->posts as $psts){
                                            $tc += $psts->clicks;
                                        }
                                        echo $tc;
                                    ?>
                            </h2>
                            <p>total clicks</p>
                        </div>
                        <!-- <div class="dash-focus dash-rev">
                            <h2>
                                <?php
                                        $tc = 0;
                                        $tp = count($user->posts);
                                        foreach($user->posts as $psts){
                                            $tc += $psts->clicks;
                                        }

                                        $strs = 0;
                                        $strs += $tc/100;
                                        $strs += $tp/10;

                                        echo round($strs);

                                    ?>
                            </h2>
                            <p>total stars</p>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- <div class="dash-header-alert alert fade show">
                        <p>From your account dashboard. you can easily check & view your recent orders, manage your
                            shipping and billing addresses and Edit your password and account details.</p>
                        <button data-dismiss="alert"><i class="fas fa-times"></i></button>
                    </div> -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <?if(!($user->role=='superuser')):?>
                        
                    <div class="dash-menu-list">
                        <?= $this->Flash->render() ?>
                        <ul class="nav nav-tabs" id="profileTabs" role="tablist">
                            <!-- <li class="nav-item"  ><a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="home" aria-selected="true">dashboard</a></li> -->
                            <li class="nav-item"><a class="nav-link active" id="ads-tab" data-toggle="tab" href="#ads"
                                    role="tab" aria-controls="ads" aria-selected="false">my ads</a></li>
                            <li class="nav-item"><a class="nav-link" id="add-post-tab" data-toggle="tab"
                                    href="#add-post" role="tab" aria-controls="add-post" aria-selected="false">Create
                                    ad</a></li>
                            <li class="nav-item"><a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                    role="tab" aria-controls="profile" aria-selected="false">Profile</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" id="setting-tab" data-toggle="tab" href="#settings"
                                    role="tab" aria-controls="settings" aria-selected="false">settings</a></li> -->
                            <li class="nav-item d-none"><a class="nav-link" id="edit-post-tab" data-toggle="tab"
                                    href="#edit-post" role="tab" aria-controls="edit-post" aria-selected="false"></a>
                            </li>

                            <!--
                                    <li><a href="ad-post.html">ad post</a></li>
                                    <li><a href="setting.html">settings</a></li>
                                    <li><a href="bookmark.html">bookmarks</a></li>
                                    <li><a href="message.html">message</a></li>
                                    <li><a href="notification.html">notification</a></li>
-->
                            <li class="nav-item"><a class="nav-link" href="/users/logout">logout</a></li>
                        </ul>
                    </div>
                    <?else:?>
                        <div class="dash-menu-list" style="display:none;">
                        <?= $this->Flash->render() ?>
                        <ul class="nav nav-tabs" id="profileTabs" role="tablist">
                            <!-- <li class="nav-item"  ><a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="home" aria-selected="true">dashboard</a></li> -->
                            <li class="nav-item"><a class="nav-link active" id="ads-tab" data-toggle="tab" href="#ads"
                                    role="tab" aria-controls="ads" aria-selected="false">my ads</a></li>
                            <li class="nav-item"><a class="nav-link" id="add-post-tab" data-toggle="tab"
                                    href="#add-post" role="tab" aria-controls="add-post" aria-selected="false">Create
                                    ad</a></li>
                            <li class="nav-item"><a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                    role="tab" aria-controls="profile" aria-selected="false">Profile</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" id="setting-tab" data-toggle="tab" href="#settings"
                                    role="tab" aria-controls="settings" aria-selected="false">settings</a></li> -->
                            <li class="nav-item d-none"><a class="nav-link" id="edit-post-tab" data-toggle="tab"
                                    href="#edit-post" role="tab" aria-controls="edit-post" aria-selected="false"></a>
                            </li>

                            <!--
                                    <li><a href="ad-post.html">ad post</a></li>
                                    <li><a href="setting.html">settings</a></li>
                                    <li><a href="bookmark.html">bookmarks</a></li>
                                    <li><a href="message.html">message</a></li>
                                    <li><a href="notification.html">notification</a></li>
-->
                            <li class="nav-item"><a class="nav-link" href="/users/logout">logout</a></li>
                        </ul>
                    </div>
                    <?endif?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================
                DASHBOARD HEADER PART END
        =======================================-->


<!--=====================================
                    DASHBOARD PART START
        =======================================-->
<section class="dashboard-part">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <br>
                <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <?
									  $postsArr = rsort($user->posts  );
									  foreach($user->posts as $k=>$resPost){
										  if($k < 4){
									  ?>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="product-card">
                                            <div class="product-media">
                                                <a href="/post-view?post_id=<?=preg_replace('/[^\da-z]/i', '-', $resPost->title);?>-<?=$resPost->id;?>&view_type=profile"
                                                    target="_blank">
                                                    <div class="product-img">
                                                        <img src="/files/posts/photo/<?=$resPost->photo_dir;?>/<?=$resPost->photo;?>"
                                                            alt="<?=$resPost->title;?> image <?=$resPost->id;?>">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <ol class="breadcrumb product-category">
                                                    <li><i class="fas fa-tags"></i></li>
                                                    <li class="breadcrumb-item"><a
                                                            href="#"><?=@$user->category->name;?></a></li>
                                                    <div class="edit-btn">
                                                        <a
                                                            onClick="location.href = '/supplierProfile?post-id=<?=$resPost->id;?>#edit-post';">Edit</a>
                                                    </div>
                                                </ol>
                                                <!-- <h5 class="product-title">
                                                    <a href="/post-view?post_id=<?=preg_replace('/[^\da-z]/i', '-', $resPost->title);?>-<?=$resPost->id;?>&view_type=profile"
                                                        target="_blank"><?=$resPost->title;?></a>
                                                </h5> -->
                                            </div>
                                        </div>
                                    </div>
                                    <? }} ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="account-card alert fade show">
                                    <div class="account-title">
                                        <h3>Supplier Status</h3>
                                        <!-- <button data-dismiss="alert">close</button> -->
                                    </div>
                                    <ul class="account-card-list">
                                        <li>
                                            <h5>Queue Status</h5>
                                            <p class="ucfirst">
                                                <? if($user->q_active == '0'){ ?>
                                                Inactive
                                                <?}else{?>
                                                Active
                                                <?}?>
                                            </p>
                                        </li>
                                        <li>
                                            <h5>Joined</h5>
                                            <p>
                                                <?
												$date=date_create($user->created);
												echo date_format($date,"jS \of F Y");?>
                                            </p>
                                        </li>

                                        <li>
                                            <h5>Last Login</h5>
                                            <p>
                                                <?
												$date=date_create($user->user_logs[count($user->user_logs) - 2]->created);
												// $date=date_create($user->created);
												echo date('Y/m/d H.m',strtotime($user->user_logs[count($user->user_logs) - 2]->created))?>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                <!--
										<div class="account-card alert fade show">
											<div class="account-title">
												<h3>Current Info</h3>
												<button data-dismiss="alert">close</button>
											</div>
											<ul class="account-card-list">
												<li><h5>Active Ads</h5><h6>3</h6></li>
												<li><h5>Booking Ads</h5><h6>0</h6></li>
												<li><h5>Rental Ads</h5><h6>1</h6></li>
												<li><h5>Sales Ads</h5><h6>2</h6></li>
											</ul>
										</div>
				-->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="account-card">
                                    <div class="account-title">
                                        <h3>Membership</h3>
                                        <!-- <a data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Edit</a> -->
                                    </div>
                                    <ul class="account-card-list">
                                        <ul class="account-card-list">
                                            <li>
                                                <h5>Status</h5>
                                                <p class="ucfirst">
                                                    <? if($user->status == '0'){ ?>
                                                    Inactive
                                                    <?}else{?>
                                                    Active
                                                    <?}?>
                                                </p>
                                            </li>
                                            <li>
                                                <h5>Joined</h5>
                                                <p>
                                                    <?
												$date=date_create($user->created);
												echo date_format($date,"jS \of F Y");?>
                                                </p>
                                            </li>

                                            <li>
                                                <h5>Last Login</h5>
                                                <p>
                                                    <?
                                                        $date=date_create($user->user_logs[count($user->user_logs) - 2]->created);
                                                        // $date=date_create($user->created);
                                                        echo date('Y/m/d H.m',strtotime($user->user_logs[count($user->user_logs) - 2]->created))?>
                                                </p>
                                            </li>
                                        </ul>

                                        <!--
											<li><h5>Spand</h5><p>4,587</p></li>
											<li><h5>Earn</h5><p>97,325</p></li>
-->
                                    </ul>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="account-card">
                                    <div class="account-title">
                                        <h3>Contact Info</h3>
                                        <a data-toggle="tab" href="#settings" role="tab" aria-controls="settings"
                                            aria-selected="false">Edit</a>
                                    </div>

                                    <ul class="account-card-list">
                                        <li>
                                            <h5>Name</h5>
                                            <p><?=$user->first_name.' '.$user->last_name;?></p>
                                        </li>
                                        <li>
                                            <h5>Email</h5>
                                            <p><?=@$user->email;?></p>
                                        </li>
                                        <li>
                                            <h5>Phone</h5>
                                            <p><?=@$user->contact;?></p>
                                        </li>
                                        <!-- <li>
                                            <h5>Your County</h5>
                                            <p><?=@$user->country->name;?></p>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade  show active" id="ads" role="tabpanel" aria-labelledby="ads-tab">
                        <div class="row">
                            <?
									  $postsArr = rsort($user->posts);
                                      if(empty($user->posts)){ ?>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card text-center">
                                    <div class="card-header">
                                        Create your first ad.
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Welcome to ImmiYami</h5>
                                        <p class="card-text">Now you can place your first ad! Press the button below
                                            to get started</p>
                                        <br>
                                        <a onClick="location.href = '/supplierProfile?#add-post';"
                                            class="btn btn-inline btn-primary">Create ad</a>
                                    </div>
                                    <div class="card-footer text-muted">

                                    </div>
                                </div>
                            </div>

                            <?         }else{
									  foreach($user->posts as $resPost){
									  ?>
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <div class="product-card">
                                    <div class="product-media">
                                        <a href="/post-view?post_id=<?=preg_replace('/[^\da-z]/i', '-', $resPost->title);?>-<?=$resPost->id;?>&view_type=profile"
                                            target="_blank">
                                            <?if($resPost->status == '1'){?>
                                            <?if($resPost->c_status == '1'){?>
                                            <span class="appstatus appvd">Active</span>
                                            <?}else{?>
                                            <span class="appstatus disappvd">Inactive</span>
                                            <?}?>
                                            <?}else{?>
                                            <span class="appstatus disappvdpend">Pending</span>
                                            <?}?>
                                            <div class="product-img">
                                                <img src="/files/posts/photo/<?=$resPost->photo_dir;?>/<?=$resPost->photo;?>"
                                                    alt="<?=$resPost->title;?> image <?=$resPost->id;?>">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <ol class="breadcrumb product-category">
                                            <li><i class="fas fa-tags"></i></li>
                                            <li class="breadcrumb-item"><a href="#"><?=@$user->category->name;?></a>
                                            </li>
                                            <div class="edit-btn">

                                                <?if($resPost->c_status == '1'){?>
                                                <?= $this->Form->postLink('<i class="fa fa-toggle-on">'.__('').'</i>', 
                                                    ['controller'=>'Posts','action' => 'inactivepost', $resPost->id],  
                                                    ['escape' => false, 'confirm' => __('Are you sure you want to inactive # {0}?', $resPost->id),'class' => 'btn btn-danger shadow btn-xs sharp toggel']) ?>

                                                <a
                                                    onClick="location.href = '/supplierProfile?post-id=<?=$resPost->id;?>#edit-post';">Edit</a>

                                                <?}else{?>
                                                <a href="javascript:void(0)"
                                                    class="btn btn-danger imp shadow btn-xs sharp toggel"><i
                                                        class="fa fa-toggle-off"></i></a>
                                                <?}?>




                                            </div>
                                        </ol>
                                        <h5 class="product-title">
                                            <a href="/post-view?post_id=<?=preg_replace('/[^\da-z]/i', '-', $resPost->title);?>-<?=$resPost->id;?>&view_type=profile"
                                                target="_blank"><?=$resPost->title;?></a>
                                        </h5>
                                        <p>Click Count : 
                                                <?if($resPost->clicks >0):?>
                                                    <?=$resPost->clicks?></p> 
                                                <?else:?>
                                                    0
                                                <?endif?>
                                    </div>
                                </div>
                            </div>
                            <? } ?>
                            <div class="col-lg-12">
                                <div class="paginator">
                                    <ul class="pagination  pagination-circle">
                                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                        <?= $this->Paginator->numbers() ?>
                                        <?= $this->Paginator->next(__('next') . ' >') ?>
                                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                                    </ul>
                                    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
                                    </p>
                                </div>
                            </div>
                            <? } ?>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="account-card alert fade show">
                                    <div class="account-title">
                                        <h3>Edit Profile</h3>
                                        <!-- <button data-dismiss="alert">close</button> -->
                                    </div>
                                    <?= $this->Form->create($user,['type'=>'file','class'=>'setting-form']) ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <?=$this->Form->control('first_name',['class'=>'form-control']);?>
                                        </div>
                                        <div class="col-lg-6">
                                            <?=$this->Form->control('last_name',['class'=>'form-control']);?>
                                        </div>
                                        <div class="col-lg-6">
                                            <?=$this->Form->control('email',['class'=>'form-control','readonly'=>true]);?>
                                        </div>
                                        <div class="col-lg-6">
                                            <?=$this->Form->control('contact',['type'=>'tel','class'=>'form-control','required'=>true,'pattern' => "[+][0-9]+",'id'=>'contact123']);?>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input pb-0 pt-0">
                                                <label for="email">Select Your Service Countries *</label>
                                                </div>
                                            <? echo $this->Form->control('Countries._ids', ['label'=>false,'id'=>'countryId2','multiple'=>true,'required'=>true,'options' => $countries123,'value'=>$countriesSS, 'empty' => true,'class'=>'multi-select wide form-control']); ?>

                                            <?//=$this->Form->control('country_id', ['label'=>'Your Country','options' => $countries, 'empty' => true,'class'=>'multi-select wide form-control']);?>
                                        </div>
                                        <!-- <div class="col-lg-6">countries2
														<?=$this->Form->control('preferred_country_id', ['options' => $preferredCountries, 'empty' => true,'class'=>'multi-select wide form-control']);?>
													</div> -->

                                        <div class="col-lg-12">
                                            <?=$this->Form->control('photo',['accept'=>"image/png, image/jpeg",'label'=>'Photo (300*300) - ( chosen-file: '.$user->photo.' )','type'=>'file','class'=>'form-control']);?>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <button type="submit" class="btn btn-inline">
                                                <i class="fas fa-user-check"></i>
                                                <span>update profile</span>
                                            </button>
                                        </div>
                                    </div>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="account-card alert fade show">
                                    <div class="account-title">
                                        <h3>Change Password</h3>
                                        <!-- <button data-dismiss="alert">close</button> -->
                                    </div>
                                    <?= $this->Form->create($user,['type'=>'file','class'=>'setting-form']) ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="password" class="form-control" pattern=".{6,}" required
                                                    name="password" id="passM" placeholder="Password">
                                                <button class="form-icon" type="button"><i
                                                        class="eyeM fas fa-eye"></i></button>
                                                <small class="form-alert">Password must be 6 characters</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="password" class="form-control" pattern=".{6,}" required
                                                    name="c_password" id="passMC" placeholder="Repeat Password">
                                                <button class="form-icon" type="button"><i
                                                        class="eyeMC fas fa-eye"></i></button>
                                                <small class="form-alert">Password must be 6 characters</small>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <a href="/users/login">
                                                <button class="btn btn-inline">
                                                    <i class="fas fa-user-check"></i>
                                                    <span>Change password</span>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="add-post" role="tabpanel" aria-labelledby="add-post-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                    // var_dump($settings_set['ad_create_due_min']);
                                    use Cake\I18n\FrozenTime;
                                    $date = new FrozenTime(@$user->posts[0]->created);
                                    $dateNow = FrozenTime::now();
                                    $newDate = $date->modify('+'.$settings_set['ad_create_due_min'].' minutes');
                                    // Outputs '2021-01-31 00:00:00'
                                    $addedDate = $newDate->format('Y-m-d H:i:s');
                                    $todayNow = $dateNow->format('Y-m-d H:i:s');
                                    // var_dump($date);
                                    // var_dump($addedDate);
                                    // var_dump($todayNow);
                                    // $nextAvailability = $settings_set['ad_create_due_min'];

                                    if($todayNow > $addedDate || empty($user->posts)){

                                    ?>
                                <?= $this->Form->create($post,['url' => '/Posts/addPost','type'=>'file','class'=>'adpost-form']) ?>
                                <div class="adpost-card">
                                    <div class="adpost-title">
                                        <h3>Ad Information
                                            <button type="button" class="btn btn-inline previewAdModal">
                                                Preview Ad
                                            </button>
                                        </h3>

                                        <hr>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <? echo $this->Form->control('title',['required'=>true,'class'=>'form-control']); ?>
                                        </div>
                                        <div class="col-lg-12">
                                            <? echo $this->Form->control('photo',['required'=>true,'id'=>'addpostCoverPhoto','accept' => 'image/*','label'=>'Cover Image (266px x 190px)','type'=>'file','class'=>'form-control']);?>
                                        </div>
                                        <div class="col-lg-12">
                                            <? echo $this->Form->control('postImages[]',['required'=>true,'id'=>'addpostImages','accept' => 'image/*','label'=>'Images (800px x 600px)','type'=>'file','multiple'=>true,'class'=>'form-control']);?>
                                        </div>
                                        <!-- <div class="col-lg-12">
                                            <? echo $this->Form->control('short_description',['id'=>'short_descriptionSet','maxlength'=>250,'label'=>'Short Description ( Characters 250 )','class'=>'form-control']);?>
                                        </div> -->
                                        <div class="col-lg-12">
                                            <? echo $this->Form->control('description',['required'=>false,'id'=>'descriptionSet','maxlength'=>1500,'label'=>'Description ( Characters 1500 )','class'=>'form-control']);?>
                                        </div>
                                        <div class="col-lg-12">
                                            <? echo $this->Form->control('Categories._ids', ['required'=>true,'id'=>'categoriesSet','options' => $categories,'multiple'=>true, 'empty' => true,'class'=>'multiselect wide form-control']);?>
                                        </div>
                                        <div class="col-lg-12">
                                            <? echo $this->Form->control('Countries._ids', ['required'=>true,'id'=>'countriesSet','options' => $countries123,'multiple'=>true, 'empty' => true,'class'=>'multiselect wide form-control']);?>
                                        </div>
                                        <div class="col-lg-12">
                                            <? echo $this->Form->control('url',['type'=>'url','required'=>false,'label'=>'URL','class'=>'form-control']);?>
                                        </div>
                                    </div>
                                </div>


                                <div class="adpost-card pb-2">
                                    <div class="adpost-agree">
                                        <div class="form-group">
                                            <!--
													<input type="checkbox" class="form-check">
-->
                                        </div>
                                        <!--
												<p>Send me Trade Email/SMS Alerts for people looking to buy mobile handsets in www By clicking "Post", you agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and acknowledge that you are the rightful owner of this item and using Trade to find a genuine buyer.</p>
-->
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-inline">
                                            <i class="fas fa-check-circle"></i>
                                            <span>save your ad</span>
                                        </button>
                                    </div>
                                </div>
                                <?= $this->Form->end() ?>
                                <?php
                                    }else{
                                       ?>
                                <div class="dash-header-alert alert fade show">
                                    <p>You have already created a adverticement within
                                        <?=$settings_set['ad_create_due_min'];?> minutes. Please try again after

                                        <?
                                        $now = new DateTime();

                                        $date = new FrozenTime(@$user->posts[0]->created);
                                        $dateNow = FrozenTime::now();

                                        $newDate = $date->modify('+'.$settings_set['ad_create_due_min'].' minutes');
                                        // Outputs '2021-01-31 00:00:00'
                                        $addedDate = $newDate->format('Y-m-d H:i:s');
                                        $todayNow = $dateNow->format('Y-m-d H:i:s');


                                        $future_date = new DateTime($addedDate);

                                        $interval = $future_date->diff($now);

                                        echo $interval->format(" %i minutes, %s seconds .");
                                        ?>
                                    </p>





                                    <button data-dismiss="alert"><i class="fas fa-times"></i></button>
                                </div>
                                <?php }
                                    ?>
                            </div>
                            <!-- <div class="col-lg-4">
                                <div class="account-card alert fade show">
                                    <div class="account-title">
                                        <h3>Tips for Advertisements</h3>
                                    </div>
                                    <ul class="account-card-text">
                                        <li>
                                            <p>Use descriptive language</p>
                                        </li>
                                        <li>
                                            <p>Use sensory details</p>
                                        </li>
                                        <li>
                                            <p>Use figurative language</p>
                                        </li>
                                        <li>
                                            <p>Use specific examples</p>
                                        </li>
                                        <li>
                                            <p>Use active voice</p>
                                        </li>
                                        <li>
                                            <p>Organize your description</p>
                                        </li>
                                        <li>
                                            <p>Use appropriate tone</p>
                                        </li>
                                        <li>
                                            <p>Use editing tools</p>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="edit-post" role="tabpanel" aria-labelledby="edit-post-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <?= $this->Form->create($postEdit,['url'=>'/Posts/editPost/'.@$postEdit->id,'type'=>'file','class'=>'adpost-form']) ?>
                                <div class="adpost-card">
                                    <div class="adpost-title">
                                        <h3>Edit Information
                                            <button type="button" class="btn btn-inline previewAdModal2">
                                                Preview Ad
                                            </button>
                                        </h3>
                                        <hr>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <? echo $this->Form->control('title',['required'=>true,'id'=>'editpostTitle','class'=>'form-control']); ?>
                                        </div>
                                        <?if($user->role =='superuser'):?>
                                            <div class="col-lg-12">
                                                <? echo $this->Form->control('supplier_id', ['options' => $users11, 'empty' => true, 'class' => 'multi-select wide form-control','label'=>'Supplier *']);?>
                                            </div>
                                            <div class="hidden">
                                                <?= $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1, 'empty' => true, 'class' => 'multi-select wide form-control']) ?>
                                            </div>
                                        <?endif?>
                                        <div class="col-lg-12">
                                            <? echo $this->Form->control('photo',['id'=>'editpostCoverPhoto','accept'=>"image/png, image/jpeg",'label'=>'Cover Image - ( chosen-file: '.$postEdit->photo.' )','type'=>'file','class'=>'form-control']);?>
                                        </div>
                                        <div class="col-lg-12">
                                            <? echo $this->Form->control('postImages[]',['id'=>'editpostPhotos','accept'=>"image/png, image/jpeg",'label'=>'Images','type'=>'file','multiple'=>true,'class'=>'form-control']);?>
                                        </div>
                                        <div class="col-lg-12 mt-3 mb-3 images-tbl-dl">
                                            <div class="card w-100">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <h4>Uploaded Images</h4>
                                                        <hr>
                                                        <table id="guestTable-all" class="display"
                                                            style="min-width: 845px">
                                                            <thead>
                                                                <thead>
                                                                    <tr>
                                                                        <th>Image Name</th>
                                                                        <th>Image</th>
                                                                        <th class="actions"><?= __('Actions') ?></th>
                                                                    </tr>
                                                                </thead>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($postEdit->post_images as $postImage): ?>
                                                                <tr>
                                                                    <td><?= h($postImage->photo) ?></td>
                                                                    <td>
                                                                        <img src="/files/postimages/photo/<?=$postImage->photo_dir;?>/square_<?=$postImage->photo;?>"
                                                                            alt="" class="w-20 mb-2">
                                                                    </td>
                                                                    <td class="actions">
                                                                        <div class="d-flex">
                                                                            <a href="/PostImages/deletePImg/<?=$postImage->id;?>"
                                                                                class="btn btn-danger shadow btn-xs sharp"
                                                                                onclick="return confirm('Are you sure you want to delete this Post Images  #<?=$postImage->photo?>')">
                                                                                <i class="fa fa-trash"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-12">
                                            <? echo $this->Form->control('short_description',['label'=>'Short Description ( Characters 250 )','maxlength'=>250,'class'=>'form-control']);?>
                                        </div> -->
                                        <div class="col-lg-12">
                                            <? echo $this->Form->control('description',['label'=>'Description ( Characters 1500 )','maxlength'=>1500,'required'=>false,'class'=>'form-control']);?>
                                        </div>
                                        <div class="col-lg-12">
                                            <? echo $this->Form->control('Categories._ids', ['required'=>true,'id'=>'cates','options' => $categories,'value'=>$categoriesS,'multiple'=>true, 'empty' => true,'class'=>'multiselect wide form-control']);?>
                                        </div>
                                        <div class="col-lg-12">
                                            <? echo $this->Form->control('Countries._ids', ['required'=>true,'id'=>'countryId','options' => $countries123,'value'=>$countriesS,'multiple'=>true, 'empty' => true,'class'=>'multiselect wide form-control']);?>
                                        </div>
                                        <div class="col-lg-12">
                                            <? echo $this->Form->control('url',['type'=>'url','required'=>false,'label'=>'URL','class'=>'form-control']);?>
                                        </div>
                                    </div>
                                </div>


                                <div class="adpost-card pb-2">
                                    <div class="adpost-agree">
                                        <div class="form-group">
                                            <!--
													<input type="checkbox" class="form-check">
-->
                                        </div>
                                        <!--
												<p>Send me Trade Email/SMS Alerts for people looking to buy mobile handsets in www By clicking "Post", you agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and acknowledge that you are the rightful owner of this item and using Trade to find a genuine buyer.</p>
-->
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-inline">
                                            <i class="fas fa-check-circle"></i>
                                            <span>save your ad</span>
                                        </button>
                                    </div>
                                </div>
                                <?= $this->Form->end() ?>
                            </div>
                            <!-- <div class="col-lg-4">
                                <div class="account-card alert fade show">
                                    <div class="account-title">
                                        <h3>Safety Tips</h3>
                                    </div>
                                    <ul class="account-card-text">
                                        <li>
                                            <p>Use descriptive language</p>
                                        </li>
                                        <li>
                                            <p>Use sensory details</p>
                                        </li>
                                        <li>
                                            <p>Use figurative language</p>
                                        </li>
                                        <li>
                                            <p>Use specific examples</p>
                                        </li>
                                        <li>
                                            <p>Use active voice</p>
                                        </li>
                                        <li>
                                            <p>Organize your description</p>
                                        </li>
                                        <li>
                                            <p>Use appropriate tone</p>
                                        </li>
                                        <li>
                                            <p>Use editing tools</p>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!--
						<div class="row">
							<div class="col-lg-12">
								<div class="footer-pagection">
									<p class="page-info">Showing 12 of 60 Results</p>
									<ul class="pagination">
										<li class="page-item">
											<a class="page-link" href="#">
												<i class="fas fa-long-arrow-alt-left"></i>
											</a>
										</li>
										<li class="page-item"><a class="page-link active" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item">...</li>
										<li class="page-item"><a class="page-link" href="#">67</a></li>
										<li class="page-item">
											<a class="page-link" href="#">
												<i class="fas fa-long-arrow-alt-right"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
-->


            </div>
        </div>
    </div>
</section>
<!--=====================================
                    DASHBOARD PART END
        =======================================-->



<!--preview Modal -->
<div class="modal fade" id="previewAdModal" tabindex="-1" role="dialog" aria-labelledby="previewAdModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewAdModalLabel">Preview Ad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--=====================================
                    AD DETAILS PART START
        =======================================-->
                <section class="inner-section ad-details-part">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">

                                <!-- AD DETAILS CARD -->
                                <div class="common-card">
                                    <ol class="breadcrumb ad-details-breadcrumb" id="posts_categories_js">

                                    </ol>
                                    <!-- <h5 class="ad-details-address"><?=@$user->country->name;?></h5> -->

                                    <h3 class="ad-details-title" id="post_title_js"></h3>
                                    <div class="ad-details-meta">
                                    </div>
                                    <div class="ad-details-slider-group">
                                        <div class="ad-details-slider slider-arrow " id="post_slider_js">

                                        </div>
                                    </div>
                                    <div class="ad-thumb-slider" id="post_slider_thumb_js">

                                    </div>
                                </div>

                                <!-- SPECIFICATION CARD -->
                                <div class="common-card">
                                    <div class="card-header">
                                        <h5 class="card-title">Specification</h5>
                                    </div>
                                    <ul class="ad-details-specific">
                                        <li id="post_category_b_js">
                                            <h6>category:</h6>

                                        </li>

                                        <li id="post_country_b_js">
                                            <h6>Countries:</h6>

                                        </li>
                                        <li>
                                            <h6>published:</h6>
                                            <p>
                                                <?
										$date=date_create($post->created);
										echo date_format($date,"jS \of F Y");?>
                                            </p>
                                        </li>
                                    </ul>
                                </div>

                                <!-- DESCRIPTION CARD -->
                                <div class="common-card">
                                    <div class="card-header">
                                        <h5 class="card-title">description</h5>
                                    </div>
                                    <p class="ad-details-desc" id="post_desc_js">
                                        <?=$post->description;?></p>
                                </div>

                            </div>

                        </div>
                    </div>
                </section>
                <!--=====================================
                    AD DETAILS PART END
        =======================================-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<!--preview Modal Edit-->
<div class="modal fade" id="previewAdModal2" tabindex="-1" role="dialog" aria-labelledby="previewAdModalLabel2"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewAdModalLabel2">Preview Ad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--=====================================
                    AD DETAILS PART START
        =======================================-->
                <section class="inner-section ad-details-part">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">

                                <!-- AD DETAILS CARD -->
                                <div class="common-card">
                                    <ol class="breadcrumb ad-details-breadcrumb" id="posts_categories_js2">

                                    </ol>
                                    <!-- <h5 class="ad-details-address"><?=@$user->country->name;?></h5> -->

                                    <h3 class="ad-details-title" id="post_title_js2"></h3>
                                    <div class="ad-details-meta">
                                    </div>
                                    <div class="ad-details-slider-group">
                                        <div class="ad-details-slider slider-arrow " id="post_slider_js2">

                                        </div>
                                    </div>
                                    <div class="ad-thumb-slider" id="post_slider_thumb_js2">

                                    </div>
                                </div>

                                <!-- SPECIFICATION CARD -->
                                <div class="common-card">
                                    <div class="card-header">
                                        <h5 class="card-title">Specification</h5>
                                    </div>
                                    <ul class="ad-details-specific">
                                        <li id="post_category_b_js2">
                                            <h6>Categories:</h6>

                                        </li>
                                        <li id="post_country_b_js2">
                                            <h6>Countries:</h6>

                                        </li>
                                        <li>
                                            <h6>published:</h6>
                                            <p>
                                                <?
										$date=date_create($post->created);
										echo date_format($date,"jS \of F Y");?>
                                            </p>
                                        </li>
                                    </ul>
                                </div>

                                <!-- DESCRIPTION CARD -->
                                <div class="common-card">
                                    <div class="card-header">
                                        <h5 class="card-title">description</h5>
                                    </div>
                                    <p class="ad-details-desc" id="post_desc_js2">
                                        <?=$post->description;?></p>
                                </div>

                            </div>

                        </div>
                    </div>
                </section>
                <!--=====================================
                    AD DETAILS PART END
        =======================================-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var maxImages = 4; // Set maximum number of images
    var fileInput = document.getElementById('addpostImages');
    
    fileInput.addEventListener('change', function() {
        var uploadedImages = fileInput.files.length;
        if (uploadedImages > maxImages) {
            alert('Maximum ' + maxImages + ' images allowed.');
            fileInput.value = ''; // Clear the file input
        }
    });
});

const contact = document.getElementById('contact123');
contact.addEventListener('input', function(event) {
    let inputvalue = contact.value;

    // Remove all non-numeric characters except '+'
    inputvalue = inputvalue.replace(/[^\d+]/g, '');

    // Ensure '+' is at the beginning and restrict to numbers after that
    if (inputvalue.charAt(0) !== '+') {
        inputvalue = '+' + inputvalue.replace(/\D/g, '');
    } else {
        inputvalue = inputvalue.charAt(0) + inputvalue.slice(1).replace(/\D/g, '');
    }

    // Update the input value
    contact.value = inputvalue;
})

</script>