
        <!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
        <section class="single-banner dashboard-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-content">
                            <h2>Profile </h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?=$user->first_name.' '.$user->last_name;?></li>
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
											<img src="/files/users/photo/<?=$user->photo_dir;?>/<?=$user->photo;?>" alt="<?=$user->first_name;?>">
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
                        <div class="col-lg-7">
                            <div class="dash-header-right">
                                <div class="dash-focus dash-list">
                                    <h2><?=count($user->posts);?></h2>
                                    <p>listing ads</p>
                                </div>
                                <div class="dash-focus dash-book">
                                    <h2>0</h2>
                                    <p>total clicks</p>
                                </div>
                                <div class="dash-focus dash-rev">
                                    <h2>0</h2>
                                    <p>total stars</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
							
                      
                            <div class="dash-menu-list">
								<?= $this->Flash->render() ?>
                                <ul class="nav nav-tabs" id="profileTabs" role="tablist">

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
						  <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
							  <div class="row">
								<div class="col-lg-8">
								  <div class="row">
									  <? 
									  $postsArr = rsort($user->posts);
									  foreach($user->posts as $k=>$resPost){
									  ?>
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
											<div class="product-card">
												<div class="product-media">
													<a href="/post-view?post_id=<?=preg_replace('/[^\da-z]/i', '-', $resPost->title);?>-<?=$resPost->id;?>" target="_blank">
													<div class="product-img">
														<img src="/files/posts/photo/<?=$resPost->photo_dir;?>/<?=$resPost->photo;?>" alt="<?=$resPost->title;?> image <?=$resPost->id;?>">
													</div>
													</a>
												</div>
												<div class="product-content">
													<ol class="breadcrumb product-category">
														<li><i class="fas fa-tags"></i></li>
														<li class="breadcrumb-item"><a href="#"><?=@$user->category->name;?></a></li>
														<div class="edit-btn">
															
															<a onClick="location.href = '/supplierProfile?post-id=<?=$resPost->id;?>#edit-post';">Edit</a>
														</div>
													</ol>
													<h5 class="product-title">
														<a href="/post-view?post_id=<?=preg_replace('/[^\da-z]/i', '-', $resPost->title);?>-<?=$resPost->id;?>" target="_blank"><?=$resPost->title;?></a>
													</h5>
												</div>
											</div>
										</div>
										<? } ?>
									</div>
									</div>
									<div class="col-lg-4">
										<div class="account-card alert fade show">
											<div class="account-title">
												<h3>Membership</h3>
												<button data-dismiss="alert">close</button>
											</div>
											<ul class="account-card-list">
												<li><h5>Status</h5><p class="ucfirst"><? if($user->status == '0'){ ?>
																Inactive
															<?}else{?>
																Active
															<?}?></p></li>
												<li><h5>Joined</h5><p ><?
												$date=date_create($user->created);
												echo date('Y/m/d',strtotime($user->created));?></p></li>
											</ul>
										</div>
										<div class="account-card">
											<div class="account-title">
												<h3>Contact Info</h3>
												<a data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Edit</a>
											</div>
										
											<ul class="account-card-list">
												<li><h5>Name:</h5><p><?=$user->first_name.' '.$user->last_name;?></p></li>
												<li><h5>Email:</h5><p><?=@$user->email;?></p></li>
												<li><h5>Phone:</h5><p><?=@$user->contact;?></p></li>
												<li><h5>County:</h5><p><?=@$user->country->name;?></p></li>
											</ul>
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

