

        <!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
        <section class="single-banner" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-content">
                            <h2>News</h2>
                            <h2><?=substr_replace($article->title, "...", 40)?></h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="/pages/articles">News-list</a></li>
                                <!-- <li class="breadcrumb-item active" aria-current="page"><?=substr_replace($article->title, "...", 40)?></li> -->
                                <!-- <li class="breadcrumb-item active" aria-current="page"><?=substr_replace($article->title, "...", 40)?></li> -->
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
                    BLOG DETAILS PART START
        ===========================================-->
        <section class="blog-details-part">
            <div class="container">
                <div class="row">
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
                                        <? foreach($popular_articles as $articles){?>
                                        <li>
                                            <div class="suggest-img">
                                                <a href="/pages/article-view?page_id=<?=preg_replace('/[^\da-z]/i', '-', $articles->title);?>-<?=$articles->id;?>">
                                                <?php
                                                    if($articles->photo_dir){ ?>
                                                        <img src="/files/articles/photo/<?=$articles->photo_dir;?>/<?=$articles->photo;?>" alt="<?=$articles->title;?>">

                                            <?php    }else{ ?>
                                                    <img src="/front/images/news.jpg">

                                            <?php    } ?>
                                                </a>
                                            </div>
                                            <div class="suggest-content">
                                                <div class="suggest-title">
                                                    <h4>
														<a href="/pages/article-view?page_id=<?=preg_replace('/[^\da-z]/i', '-', $articles->title);?>-<?=$articles->id;?>">
														<?=($articles->title)?> <!-- Apeksha Remove the Titel Shoten -->
														</a>
													</h4>
                                                </div>
                                                <div class="suggest-meta">
                                                    <div class="suggest-date">
                                                        <i class="far fa-calendar-alt"></i>
                                                        <p><?
														$date=date_create($articles->created);
														echo date('Y/m/d',strtotime($articles->created));
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
                                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 m-auto" >
                        
                        <div class="blog-details-title">
                            <h2 class="single-content"><?=($article->title)?></h2> <!-- Apeksha Remove the Titel Shoten -->
                        </div>
                        <ul class="blog-details-meta">
                            <li>
                                <a>
                                    <i class="far fa-calendar-alt"></i>
                                    <p><?
										$date=date_create($article->created);
										echo date('Y/m/d',strtotime($article->created));
										?></p>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="#">
                                    <i class="far fa-folder-open"></i>
                                    <p>news</p>
                                </a>
                            </li> -->

                        </ul>
                        <div class="blog-details-image">
                        <?php
                                                    if($article->photo_dir){ ?>
                                                        <img src="/files/articles/photo/<?=$article->photo_dir;?>/<?=$article->photo;?>" alt="<?=$article->title;?>">

                                            <?php    }else{ ?>
                                                    <img src="/front/images/newsview.jpg">

                                            <?php    } ?></div>
                        <div class="blog-details-content">
                            <div class="description">
                                <?=($article->description)?> <!-- Apeksha Remove the Titel Shoten -->
                            </div>
                        </div>

                    </div>

                    </div>
                    
                </div>
            </div>
        </section>
        <!--=========================================
                    BLOG DETAILS PART END
        ===========================================-->
