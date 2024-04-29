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
                        <li class="breadcrumb-item active" aria-current="page">member dashboard</li>
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
                <div class="col-lg-8">
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
                            <h5 class="ucfirst">
                                <?
                            rsort($user->payments);
                            $ec =true;
                            foreach ($user->payments as $key => $p) {
                                if($p->status == '1'){
                                    if($ec){
                                        echo $p->package;
                                        $ec = false;
                                    }
                                }else{
                                    if($ec){
                                        echo 'Free';
                                        $ec = false;
                                    }
                                }
                                # code...
                            }
                            // if($user->payments[count($user->payments) - 1]->status == '0'){

                            // }
                            ?> member
                            </h5>
                            <ul class="dash-meta">
                                <li>
                                    <i class="fas fa-phone-alt"></i>
                                    <span><?=@$user->contact;?></span>
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <span><?=@$user->email;?></span>
                                </li>
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span><?=@$user->country->name;?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="dash-header-right">
                        <div class="dash-focus dash-list">
                            <h2 class="ucfirst">
                                <?
                            rsort($user->payments);
                            $ec =true;
                            foreach ($user->payments as $key => $p) {
                                if($p->status == '1'){
                                    if($ec){
                                        echo $p->package;
                                        $ec = false;
                                    }
                                }else{
                                    if($ec){
                                        echo 'Free';
                                        $ec = false;
                                    }
                                }
                                # code...
                            }

                            // =@$user->payments[count($user->payments) - 1]->package;

                            ?>
                            </h2>
                            <p>Membership</p>
                            <?if(@$user->payments[count($user->payments) - 1]->package != 'platinum' && $user->payments[count($user->payments) - 1]->status == '0'){?>
                            <a href="/pages/membership" class="d-block">
                                <div class="upgrade-now-btn-prof">
                                    <p>Upgrade Now</p>
                                </div>
                            </a>
                            <?}?>
                        </div>
                        <!--
                                <div class="dash-focus dash-book">
                                    <h2>2433</h2>
                                    <p>total follower</p>
                                </div>
                                <div class="dash-focus dash-rev">
                                    <h2>2433</h2>
                                    <p>total review</p>
                                </div>
-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="dash-header-alert alert fade show warning-bar">
                        <p>Welcome to ImmiYami, Your ultimate destination for immigration. Explore your <a
                                href="/feesibility">eligibility</a>, browse <a href="/list-posts">classified ads</a>,
                            and stay informed with our Immigration <a href="/pages/articles">News</a> and <a
                                href="/pages/videos">Videos</a>.</p>
                        <button data-dismiss="alert"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="dash-header-alert alert fade show">
                        <p>From your account dashboard. you can easily manage your account and Edit your password and
                            account details. Upgrade your profile click <a href="/pages/membership">here*</a></p>
                        <button data-dismiss="alert"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">


                    <div class="dash-menu-list">
                        <?= $this->Flash->render() ?>
                        <ul class="nav nav-tabs" id="profileTabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="dashboard-tab" data-toggle="tab"
                                    href="#dashboard" role="tab" aria-controls="home" aria-selected="true">dashboard</a>
                            </li>
                            <!-- <li class="nav-item"  ><a class="nav-link" id="ads-tab" data-toggle="tab" href="#ads" role="tab" aria-controls="profile" aria-selected="false">new ads</a></li> -->
                            <li class="nav-item"><a class="nav-link" id="ads-tab" target="_blank"
                                    href="/list-posts/">ads</a></li>
                            <li class="nav-item"><a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                    role="tab" aria-controls="profile" aria-selected="false">Profile</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" id="setting-tab" data-toggle="tab" href="#settings"
                                    role="tab" aria-controls="settings" aria-selected="false">settings</a></li> -->
                            <!--
                                    <li><a href="/users/memberProfile">Profile</a></li>
                                    <li><a href="#">ads</a></li>
                                    <li><a href="#">settings</a></li>
-->
                            <!--
                                    <li><a href="ad-post.html">ad post</a></li>
                                    <li><a href="my-ads.html">my ads</a></li>
                                    <li><a href="setting.html">settings</a></li>
                                    <li><a href="bookmark.html">bookmarks</a></li>
                                    <li><a href="message.html">message</a></li>
                                    <li><a href="notification.html">notification</a></li>
-->
                            <li class="nav-item"><a class="nav-link" href="/users/logout">logout</a></li>
                        </ul>
                    </div>
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
                    <div class="tab-pane fade show active" id="dashboard" role="tabpanel"
                        aria-labelledby="dashboard-tab">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="account-card alert fade show">
                                    <div class="account-title">
                                        <h3>Feasibility History</h3>
                                        <!-- <button data-dismiss="alert">close</button> -->
                                    </div>
                                    <table class="table" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>Country</th>
                                                <th>Visa Type</th>
                                                <!-- <th>Date</th> -->
                                                <th>Result</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                            rsort($user->xml_submissions);
                                            foreach($user->xml_submissions as $xmlsub){?>

                                            <tr>
                                                <td><?=$xmlsub->xml_country->name;?></td>
                                                <td><?=$xmlsub->xml_visatype->name;?></td>
                                                <!-- <td>
                                                    <?
                                                    $date=date_create($xmlsub->created);
                                                    echo date_format($date,"Y-M-d H:i:s");
                                                    ?>
                                                </td> -->
                                                <td class="align-right">
                                                    <?
                                                        // $color= 'white';
                                                        $points = 0;
                                                        foreach($xmlsub->xml_submission_answers as $answers){
                                                            $points += $answers->xml_criteria_answer->point;
                                                        }
                                                        // echo $points;
                                                        $pointsArr = [];
                                                        foreach($xmlsub->xml_qualification->xml_qualif_points as $k=>$xp){
                                                            $pointsArr[$k][$xp->color] = (int)$xp->points;
                                                        }
                                                        sort($pointsArr);
                                                        foreach($pointsArr as $p){
                                                            foreach($p as $c=>$pp){
                                                                // var_dump($pp);
                                                                if($points >= $pp){
                                                                    $color= $c;
                                                                }
                                                            }
                                                        }

                                                        // echo $color;

                                                        if($color == 'Orange'){
                                                            echo 'Average';
                                                        }elseif($color == 'Green'){
                                                            echo 'Above Average';
                                                        }else{
                                                            echo 'Below Average';
                                                        }
                                                    ?>

                                                    &nbsp;<span class="ciecleOf-point"
                                                        style="background: <?=@$color;?>;"></span>
                                                </td>
                                            </tr>

                                            <?    }
                                        ?>
                                        </tbody>
                                    </table>
                                    <!-- <ul class="account-card-list">



                                    </ul> -->
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="account-card alert fade show">
                                    <div class="account-title">
                                        <h3>Membership</h3>
                                        <!-- <button data-dismiss="alert">close</button> -->
                                    </div>
                                    <ul class="account-card-list">
                                        <li>
                                            <h5>Package</h5>
                                            <p class="ucfirst">

                                                <?
                                                $ppPack= '';
                                                  rsort($user->payments);
                                                  $ec =true;
                                                  foreach ($user->payments as $key => $p) {
                                                      if($p->status == '1'){
                                                          if($ec){
                                                            $ppPack = $p->package;
                                                              echo $p->package;
                                                              $ec = false;
                                                          }
                                                      }else{
                                                        if($ec){
                                                            
                                                            $ppPack = 'free';
                                                            echo 'Free';
                                                            $ec = false;
                                                        }
                                                    }
                                                      # code...
                                                  }
                                                ?>
                                                <?//=@$user->payments[count($user->payments) - 1]->package;?>
                                            </p>
                                        </li>
                                        <li>
                                            <!-- <h5>Features</h5> -->

                                            <? if($ppPack == 'free'){?>

                                            <p><span class='feat-mem'>Features Of Package</span><br>
                                                <a href="/list-posts" target="_blank"><i class='fa fa-dot-circle'></i>
                                                    &nbsp;
                                                    Classified Access </a><br>
                                                <a href="/list-posts?category_id%5B%5D=3" target="_blank"><i
                                                        class='fa fa-dot-circle'></i> &nbsp;
                                                    Immigration agents </a>
                                                <br>
                                                <a href="/list-posts?category_id%5B%5D=1" target="_blank"><i
                                                        class='fa fa-dot-circle'></i> &nbsp;
                                                    IELTS classes </a><br>
                                                <a href="/feesibility" target="_blank"> <i class='fa fa-dot-circle'></i>
                                                    &nbsp;
                                                    Visa check list </a>
                                            </p>

                                            <? }?>
                                            <? if($ppPack == 'gold'){?>

                                            <p><span class='feat-mem'>Features Of Package</span><br>
                                                <a href="/feesibility" target="_blank"><i class='fa fa-dot-circle'></i>
                                                    &nbsp;
                                                    Mock visa Interviews</a> <br>
                                                <a href="#" target="_blank"><i class='fa fa-dot-circle'></i> &nbsp;
                                                    Job seekers websites</a> <br>
                                                <a href="#" target="_blank"><i class='fa fa-dot-circle'></i> &nbsp;
                                                    Vehicle sales and business sales websites</a> <br>
                                                <a href="#" target="_blank"><i class='fa fa-dot-circle'></i> &nbsp;
                                                    House rent and room rental sites</a>
                                            </p>
                                            <? }?>
                                        </li>
                                        <li>
                                            <h5>Joined</h5>
                                            <p>
                                                <?
												$date=date_create($user->created);
												echo date('Y/m/d',strtotime($user->created));?>
                                            </p>
                                        </li>
                                        <li>
                                            <?if($user->user_logs[count($user->user_logs) - 2]->created):?>

                                                <h5>Last Login</h5>
                                                <p>
                                                    <?
                                                    $date=date_create($user->user_logs[count($user->user_logs) - 2]->created);
                                                    // $date=date_create($user->created);
                                                    echo date('Y/m/d H.m',strtotime($user->user_logs[count($user->user_logs) - 2]->created))?>
                                                </p>
                                            <?endif?>
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
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="account-card">
                                    <div class="account-title">
                                        <h3>Membership</h3>
                                        <a href="/pages/membership" role="tab" aria-controls="settings"
                                            aria-selected="false">Upgrade</a>
                                    </div>
                                    <ul class="account-card-list">
                                        <ul class="account-card-list">
                                            <li>
                                                <h5>Status</h5>
                                                <p class="ucfirst">
                                                    <?
                                                      rsort($user->payments);
                                                      $ec =true;
                                                      foreach ($user->payments as $key => $p) {
                                                          if($p->status == '1'){
                                                              if($ec){
                                                                  echo $p->package;
                                                                  $ec = false;
                                                              }
                                                          }else{
                                                            if($ec){
                                                                echo 'Free';
                                                                $ec = false;
                                                            }
                                                        }
                                                          # code...
                                                      }
                                                      ?>
                                                    <?//=@$user->payments[count($user->payments) - 1]->package;?>
                                                </p>
                                            </li>
                                            <li>
                                                <h5>Joined</h5>
                                                <p>
                                                    <?
												$date=date_create($user->created);
												echo date('Y/m/d',strtotime($user->created));?>
                                                </p>
                                            </li>
                                            <li>
                                                <?if($user->user_logs[count($user->user_logs) - 2]->created):?>
                                                    <h5>Last Login</h5>
                                                    <p>
                                                        <?
                                                            $date=date_create($user->user_logs[count($user->user_logs) - 2]->created);
                                                            // $date=date_create($user->created);
                                                            echo date('Y/m/d H.m',strtotime($user->user_logs[count($user->user_logs) - 2]->created))?>
                                                    </p>
                                                <?endif?>
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
                                        <li>
                                            <h5>County</h5>
                                            <p><?=@$user->country->name;?></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="ads" role="tabpanel" aria-labelledby="ads-tab">
                        <div class="row">
                            <?
									  foreach($posts as $resPost){
										  if($k < 12){
									  ?>
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <div class="product-card">
                                    <div class="product-media">
                                        <a href="/post-view?post_id=<?=preg_replace('/[^\da-z]/i', '-', $resPost->title);?>-<?=$resPost->id;?>"
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
                                            <li class="breadcrumb-item"><a href="#"><?=@$user->category->name;?></a>
                                            </li>
                                        </ol>
                                        <h5 class="product-title">
                                            <a href="/post-view?post_id=<?=preg_replace('/[^\da-z]/i', '-', $resPost->title);?>-<?=$resPost->id;?>"
                                                target="_blank"><?=$resPost->title;?></a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <? }} ?>

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
                                            <!--<?=$this->Form->control('contact',['class'=>'form-control','required'=>true]);?>-->
                                        </div>
                                        <div class="col-lg-6">
                                            <?=$this->Form->control('country_id', ['options' => $countries, 'empty' => true,'class'=>'multi-select wide form-control','required'=>true]);?>
                                        </div>
                                        <div class="col-lg-6">
                                            <?=$this->Form->control('preferred_country_id', ['options' => $preferredCountries, 'empty' => true,'class'=>'multi-select wide form-control','required'=>true]);?>
                                        </div>

                                        <div class="col-lg-12">
                                            <?=$this->Form->control('photo',['accept'=>"image/png, image/jpeg",'label'=>'Photo (300*300) - ( chosen-file: '.$user->photo.' )','type'=>'file','class'=>'form-control']);?>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <button class="btn btn-inline">
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
                                                <input type="password" class="form-control" required name="password"
                                                    id="passM" placeholder="Password">
                                                <button class="form-icon" type="button"><i
                                                        class="eyeM fas fa-eye"></i></button>
                                                <small class="form-alert">Password must be 6 characters</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="c_password"
                                                    id="passMC" placeholder="Repeat Password">
                                                <button class="form-icon" type="button"><i
                                                        class="eyeMC fas fa-eye"></i></button>
                                                <small class="form-alert">Password must be 6 characters</small>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <button class="btn btn-inline">
                                                <i class="fas fa-user-check"></i>
                                                <span>Change password</span>
                                            </button>
                                        </div>
                                    </div>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>

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

<div class="modal fade" id="QueModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">You have an opportunity to discussion with a supplier.
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <?= $this->Form->create(null,['url'=>'/Users/memberDetailsToQ']) ?>
            <div class="modal-body">

                <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control" name="message" id="message-text"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary">Skip</button>
                <button type="submit" class="btn btn-primary">Send message</button>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


<script>
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