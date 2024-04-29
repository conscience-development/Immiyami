



        <!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
        <section class="inner-section single-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-content">
                            <h2>ad list</h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">ads list</li>
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
                    AD LIST PART START
        =======================================-->
        <section class="inner-section ad-list-part">
            <div class="container">
                <div class="row content-reverse">
                    <div class="col-lg-4 col-xl-3">
                        <div class="row">



                            <div class="col-md-6 col-lg-12">
                                <div class="product-widget">
                                    <h6 class="product-widget-title">Search</h6>
                                    <?= $this->Form->create(null, ['type'=>'GET','class'=>"product-widget-form"]); ?>
                                        <div class="product-widget-search">
                                            <input type="text" name="q" placeholder="Search">
                                        </div>
                                        <br>
                                        <button type="submit" class="product-widget-btn">
                                            <i class="fas fa-paper-plane"></i>
                                            <span>Search</span>
                                        </button>
                                        <?= $this->Form->end() ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12">
                                <div class="product-widget">
                                    <h6 class="product-widget-title">Filter by Countries</h6>
                                    <?= $this->Form->create(null, ['type'=>'GET','class'=>"product-widget-form"]); ?>
                                        <ul class="product-widget-list product-widget-scroll">
											<? foreach($countries as $k=>$country){ ?>
                                            <li class="product-widget-item">
                                                <div class="product-widget-checkbox">
                                                    <input type="checkbox" <? if(in_array($k,@$countriesS)){echo 'checked';} ?> id="chcekcountry<?=$k?>" value="<?=$k?>" name="country_id[]">
                                                </div>
                                                <label class="product-widget-label" for="chcekcountry<?=$k?>">
                                                    <span class="product-widget-text"><?=$country?></span>
<!--
                                                    <span class="product-widget-number">(95)</span>
-->
                                                </label>
                                            </li>
                                            <?}?>
                                        </ul>
                                        <button type="submit" class="product-widget-btn">
                                        <i class="fas fa-paper-plane"></i>
                                            <span>Search</span>
                                        </button>
                                        <?= $this->Form->end() ?>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-12">
                                <div class="product-widget">
                                    <h6 class="product-widget-title">filter by category</h6>
                                    <?= $this->Form->create(null, ['type'=>'GET','class'=>"product-widget-form"]); ?>
										<ul class="product-widget-list product-widget-scroll">
											<? foreach($categories as $k=>$category){ ?>
                                            <li class="product-widget-item">
                                                <div class="product-widget-checkbox">
                                                    <input type="checkbox" <? if(in_array($k,@$categoriesS)){echo 'checked';} ?> id="chcekcat<?=$k?>" value="<?=$k?>" name="category_id[]">
                                                </div>
                                                <label class="product-widget-label" for="chcekcat<?=$k?>">
                                                    <span class="product-widget-text"><?=$category?></span>
<!--
                                                    <span class="product-widget-number">(95)</span>
-->
                                                </label>
                                            </li>
                                            <?}?>
                                        </ul>

                                        <button type="submit" class="product-widget-btn">
                                                <i class="fas fa-paper-plane"></i>
                                            <span>Search</span>
                                        </button>

                                        <?= $this->Form->end() ?>
                                </div>

                            </div>
                            <div class="col-md-6 col-lg-12">
                                <div class="product-widget">
                                <button type="button" onclick="location.href = '/list-posts';" class="product-widget-btn">
                                <i class="fas fa-broom"></i>
                                <span>Clear Filter</span>
                            </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-9 post-list">

                        <div class="row">
							<?

							  foreach($posts as $k=>$resPost){
							  ?>
								<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
									<div class="product-card">
										<div class="product-media">
											<a href="/post-view?post_id=<?=preg_replace('/[^\da-z]/i', '-', $resPost->title);?>-<?=$resPost->id;?>" target="_blank">
											<div class="product-img">
												<img src="/files/posts/photo/<?=$resPost->photo_dir;?>/<?=$resPost->photo;?>" alt="<?=$resPost->title;?> image <?=$resPost->id;?>">
											</div>
											</a>
										</div>
										<div class="product-content">
											<!-- <ol class="breadcrumb product-category">
                                                <?
                                                    // var_dump($resPost->posts_categories);
                                                    foreach($resPost->posts_categories as $k=>$catL){
                                                    if($k < 3){
                                                        //var_dump($catLA->category->name);
                                                    ?>
												<li><i class="fas fa-tags"></i></li>
												<li class="breadcrumb-item"><a href="#"><?=$catL->category->name.' ';?></a></li>
                                                <? }} ?>
                                            </ol> -->
											<h5 class="product-title">
												<a href="/post-view?post_id=<?=preg_replace('/[^\da-z]/i', '-', $resPost->title);?>-<?=$resPost->id;?>" target="_blank"><?=$resPost->title;?></a>
											</h5>
										</div>
									</div>
								</div>
								<? } ?>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="footer-pagection">
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

<!--
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
-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                    AD LIST PART END
        =======================================-->









