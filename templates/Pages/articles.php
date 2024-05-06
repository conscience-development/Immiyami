
        <!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
        <section class="single-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-content">
                            <h2>news list</h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">News</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                  SINGLE BANNER PART END
        =======================================-->


        <!--=========================================
                    NEWS LIST PART START
        ===========================================-->
        <section class="blog-part">
            <div class="container">
                <div class="row content-reverse">
                    <div class="col-lg-4">
                        <div class="row">

                            <!-- SEARCH BAR -->
<!--
                            <div class="col-lg-12">
                                <div class="blog-sidebar">
                                    <div class="blog-sidebar-title">
                                        <h5>Search</h5>
                                    </div>
                                    <form class="blog-src">
                                        <input type="text" placeholder="Search...">
                                        <button><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
-->

                            <!-- POPULAR POST -->
                            <div class="col-md-8 col-lg-12 m-auto">
                                <div class="blog-sidebar">
                                    <div class="blog-sidebar-title">
                                        <h5>popular post</h5>
                                    </div>
                                    <ul class="blog-suggest">
										<? foreach($popular_articles as $article){?>
                                        <li>
                                            <div class="suggest-img">
                                                <a href="/pages/article-view?page_id=<?=preg_replace('/[^\da-z]/i', '-', $article->title);?>-<?=$article->id;?>">
												<?php
                                                        if($article->photo_dir){ ?>
                                                         <img src="/files/articles/photo/<?=$article->photo_dir;?>/<?=$article->photo;?>" alt="<?=$article->title;?>">

                                                <?php    }else{ ?>
                                                        <img src="/front/images/news.jpg">

                                                <?php    } ?>

                                                </a>
                                            </div>
                                            <div class="suggest-content">
                                                <div class="suggest-title">
                                                    <h4>
														<a href="/pages/article-view?page_id=<?=preg_replace('/[^\da-z]/i', '-', $article->title);?>-<?=$article->id;?>">
														<?=substr_replace($article->title, "...", 45)?> <!-- Apeksha change this line and shot titel for 45 -->
														
														</a>
													</h4>
                                                </div>
                                                <div class="suggest-meta">
                                                    <div class="suggest-date">
                                                        <i class="far fa-calendar-alt"></i>
                                                        <p><?
														$date=date_create($article->created);
														echo date('Y/m/d',strtotime($article->created));
														?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <? } ?>

                                    </ul>
                                </div>
                            </div>

                            <!-- FOLLOW US -->
                            <div class="col-md-8 col-lg-12 m-auto">
                                <div class="blog-sidebar">
                                    <div class="blog-sidebar-title">
                                        <h5>follow us</h5>
                                    </div>
                                    <ul class="blog-icon">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
<!--
                                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
-->
<!--
                                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
							<? foreach($articles as $article){?>
                            <div class="col-sm-10 col-md-6 col-lg-6 m-auto">
                                <div class="blog-card mb-5">
                                    <div class="blog-img">
                                    <?php
                                            if($article->photo_dir){ ?>
                                                <img src="/files/articles/photo/<?=$article->photo_dir;?>/<?=$article->photo;?>" alt="<?=$article->title;?>">

                                    <?php    }else{ ?>
                                            <img src="/front/images/news.jpg">

                                    <?php    } ?>
                                        <div class="blog-overlay">
											<span class="safety">NEWS</span>
										</div>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="blog-meta">
                                            <li>
                                                <i class="fas fa-clock"></i>
                                                <p><?
												$date=date_create($article->created);
												echo date('Y/m/d',strtotime($article->created));
												?></p>
                                            </li>
                                        </ul>
                                        <div class="blog-text">
                                            <h4><a href="/pages/article-view?page_id=<?=preg_replace('/[^\da-z]/i', '-', $article->title);?>-<?=$article->id;?>">
                                            <?=($article->title)?> <!-- Apeksha Remove the Titel Shoten -->
											</a></h4>
                                            <p><?=substr_replace($article->short_description, "...", 70)?></p>
                                        </div>

                                        <a href="/pages/article-view?page_id=<?=preg_replace('/[^\da-z]/i', '-', $article->title);?>-<?=$article->id;?>" class="blog-read">
                                            <span>read more</span>
                                            <i class="fas fa-long-arrow-alt-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <? } ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mt-5">
                                <div class="paginator">
									<ul class="pagination  pagination-circle">
										<?= $this->Paginator->first('<< ' . __('first')) ?>
										<?= $this->Paginator->prev('< ' . __('previous')) ?>
										<?= $this->Paginator->numbers() ?>
										<?= $this->Paginator->next(__('next') . ' >') ?>
										<?= $this->Paginator->last(__('last') . ' >>') ?>
									</ul>
									<p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=========================================
                        NEWS LIST PART END
        ===========================================-->
