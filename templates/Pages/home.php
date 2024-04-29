


        <!--=====================================
                     NEWS PART START
        =======================================-->
        <section class="blog-part pt-0 pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-center-heading color-black mt-5">
                            <h2>New <span>Trending</span></h2>
                            <p class="color-black">ImmiYami News are the latest immigration related news from respective countries which will help you to make your journey smoother and worthy..</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-slider slider-arrow">

							<? foreach($home_articles as $harticle){?>
                            <div class="blog-card">
                                <div class="blog-img">
                                <?php
                                            if($harticle->photo_dir){ ?>
                                                <img src="/files/articles/photo/<?=$harticle->photo_dir;?>/<?=$harticle->photo;?>" alt="<?=$harticle->title;?>">

                                    <?php    }else{ ?>
                                            <img src="/front/images/news.jpg">

                                    <?php    } ?>
                                    <!-- <img src="/files/articles/photo/<?=$harticle->photo_dir;?>/<?=$harticle->photo;?>" alt="<?=$harticle->title;?>"> -->
                                    <div class="blog-overlay">
										<span class="safety">HOT</span>
									</div>
                                </div>
                                <div class="blog-content">
                                    <ul class="blog-meta">

                                        <li>
                                            <i class="fas fa-clock"></i>
                                            <p><?
                                            $date=date_create($harticle->created);
											echo date('Y/m/d',strtotime($harticle->created));
											?></p>
                                        </li>
                                    </ul>
                                    <div class="blog-text">
                                        <h4><a href="/pages/article-view?page_id=<?=preg_replace('/[^\da-z]/i', '-', $harticle->title);?>-<?=$harticle->id;?>"><?=substr_replace($harticle->title, "...", 30)?></a></h4>
                                   </div>
                                    <a href="/pages/article-view?page_id=<?=preg_replace('/[^\da-z]/i', '-', $harticle->title);?>-<?=$harticle->id;?>" class="blog-read">
                                        <span>read more</span>
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                    </a>
                                </div>
                            </div>
                            <? } ?>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-6 d-block d-sm-none">
						 <?= $this->element('left-ad') ?>
					</div>
                    <div class="col-6 d-block d-sm-none">
						 <?= $this->element('left-ad2') ?>
					</div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-btn">
                            <a href="/pages/articles" class="btn btn-inline">
                                <i class="fas fa-eye"></i>
                                <span>view all news</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                     NEWS PART END
        =======================================-->





        <!--=====================================
                    VIDEO PART START
        =======================================-->
        <section class="section trend-part pt-0">
            <div class="container video">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-center-heading color-black">
                            <h2>Learn from <span>Success Stories</span></h2>
                            <p class="color-black">We share success stories of some immigrants who have completed the journey and its not only students but also white and blue colour jobs have opportunities in the developed countries.</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
					<div class="col-lg-12">
				   <div class="video-slider slider-arrow">
                    <? foreach($home_videos as $hvideo){?>
                    <? if($hvideo->premium == '0'){?>
<!--
                    <div class="col-md-4 col-lg-4 col-xl-4 col-xs-6">
-->
                        <div class="product-card standard vid">
                            <div class="product-media ">
                                <div class="product-img">
                                    <?
                                    if($hvideo->photo){
										if($hvideo->type == 'youtube'){
											$code = explode('=',$hvideo->url);
											$code = explode('&',$code[1]);
										?>
										<iframe width="100%" class="d-none"  src="https://www.youtube.com/embed/<?=$code[0];?>" frameborder="0" sandbox="allow-same-origin allow-scripts allow-popups allow-forms" allowfullscreen></iframe>
										<?
										}else{ ?>
											<iframe width="100%" class="d-none"  src="/files/videos/file/<?=$hvideo->file_dir;?>/<?=$hvideo->file?>" frameborder="0" sandbox allowfullscreen></iframe>

										<?}?>

										<img src="/files/videos/photo/<?=$hvideo->photo_dir;?>/<?=$hvideo->photo?>" class="width-100" alt="<?=$hvideo->title?>">

									<? }else{
										if($hvideo->type == 'youtube'){
											$code = explode('=',$hvideo->url);
											$code = explode('&',$code[1]);
									?>
											<iframe width="100%" class="d-none"  src="https://www.youtube.com/embed/<?=$code[0];?>" frameborder="0" sandbox="allow-same-origin allow-scripts allow-popups allow-forms" allowfullscreen></iframe>
											<img class="d-flex width-100" src="https://img.youtube.com/vi/<?=$code[0]; ?>/0.jpg" alt="<?=$hvideo->title?>">
									<?	}else{

									?>
										<iframe width="100%" class="d-none"  src="/files/videos/file/<?=$hvideo->file_dir;?>/<?=$hvideo->file?>" frameborder="0" sandbox allowfullscreen></iframe>
										<img src="/front/videos/sample.jpg" class="width-100">
									<?
										}
									}
									?>

                                </div>
                                <h5 class="product-title">
                                    <?=substr_replace($hvideo->title, "...", 40)?>
                                </h5>
                            </div>
                        </div>
                        <?}else{?>
                            <? if(@$Auth->payments[count($Auth->payments) - 1]->package != 'platinum' || @$Auth->payments[count($Auth->payments) - 1]->package != 'gold' || @$Auth->payments[count($Auth->payments) - 1]->status == '0' ){?>
                                <div class="product-card standard vidp">
                                    <div class="product-media ">
                                        <div class="product-img">
                                            <?
                                            if($hvideo->photo){
                                                if($hvideo->type == 'youtube'){
                                                    $code = explode('=',$hvideo->url);
                                                    $code = explode('&',$code[1]);
                                                ?><?}?>

                                                <img src="/files/videos/photo/<?=$hvideo->photo_dir;?>/<?=$hvideo->photo?>" class="width-100" alt="<?=$hvideo->title?>">

                                            <? }else{
                                                if($hvideo->type == 'youtube'){
                                                    $code = explode('=',$hvideo->url);
                                                    $code = explode('&',$code[1]);
                                            ?>
                                                    <img class="d-flex width-100" src="https://img.youtube.com/vi/<?=$code[0]; ?>/0.jpg" alt="<?=$hvideo->title?>">
                                            <?	}else{

                                            ?>
                                                <img src="/front/videos/sample.jpg" class="width-100">
                                            <?
                                                }
                                            }
                                            ?>

                                        </div>
                                        <h5 class="product-title">
                                            <?=substr_replace($hvideo->title, "...", 40)?>
                                        </h5>
                                    </div>
                                </div>
                            <?}else{?>
                                <div class="product-card standard vid">
                                    <div class="product-media ">
                                        <div class="product-img">
                                            <?
                                            if($hvideo->photo){
                                                if($hvideo->type == 'youtube'){
                                                    $code = explode('=',$hvideo->url);
                                                    $code = explode('&',$code[1]);
                                                ?>
                                                <iframe width="100%" class="d-none"  src="https://www.youtube.com/embed/<?=$code[0];?>" frameborder="0" sandbox="allow-same-origin allow-scripts allow-popups allow-forms" allowfullscreen></iframe>
                                                <?
                                                }else{ ?>
                                                    <iframe width="100%" class="d-none"  src="/files/videos/file/<?=$hvideo->file_dir;?>/<?=$hvideo->file?>" frameborder="0" sandbox allowfullscreen></iframe>

                                                <?}?>

                                                <img src="/files/videos/photo/<?=$hvideo->photo_dir;?>/<?=$hvideo->photo?>" class="width-100" alt="<?=$hvideo->title?>">

                                            <? }else{
                                                if($hvideo->type == 'youtube'){
                                                    $code = explode('=',$hvideo->url);
                                                    $code = explode('&',$code[1]);
                                            ?>
                                                    <iframe width="100%" class="d-none"  src="https://www.youtube.com/embed/<?=$code[0];?>" frameborder="0" sandbox="allow-same-origin allow-scripts allow-popups allow-forms" allowfullscreen></iframe>
                                                    <img class="d-flex width-100" src="https://img.youtube.com/vi/<?=$code[0]; ?>/0.jpg" alt="<?=$hvideo->title?>">
                                            <?	}else{

                                            ?>
                                                <iframe width="100%" class="d-none"  src="/files/videos/file/<?=$hvideo->file_dir;?>/<?=$hvideo->file?>" frameborder="0" sandbox allowfullscreen></iframe>
                                                <img src="/front/videos/sample.jpg" class="width-100">
                                            <?
                                                }
                                            }
                                            ?>

                                        </div>
                                        <h5 class="product-title">
                                            <?=substr_replace($hvideo->title, "...", 40)?>
                                        </h5>
                                    </div>
                                </div>
                            <?}?>
                        <?}?>
                    <?}?>
                    </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-6 d-block d-sm-none">
						 <?= $this->element('right-ad') ?>
					</div>
                    <div class="col-6 d-block d-sm-none">
						 <?= $this->element('right-ad2') ?>
					</div>
                    <div class="col-lg-12">
                        <div class="center-20">
                            <a href="/pages/videos" class="btn btn-inline">
                                <i class="fas fa-eye"></i>
                                <span>view all videos</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                    VIDEO PART END
        =======================================-->













