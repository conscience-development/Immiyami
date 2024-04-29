
        <!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
        <section class="single-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-content">
                            <h2>videos list</h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">videos</li>
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
                    VIDEO LIST PART START
        ===========================================-->
        <section class="blog-part video video-page">
            <div class="container">
                <div class="row videos">

                    <div class="col-lg-12 video-search">

						<?= $this->Form->create(NULL,['method'=>'GET']) ?>
						<div class="header-search">
                            <button type="submit" title="Search"><i class="fas fa-search"></i></button>
                            <input type="text" name="search" value="<?=@$search;?>" placeholder="Search, Whatever you needs...">
                            <button type="submit" title="Search" class="option-btn"><i class="fas fa-check"></i></button>

                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
						<? foreach($videos as $hvideo){?>
                            <? if($hvideo->premium == '0'){?>
                                <div class="col-md-3 col-lg-3 col-xl-3 col-xs-6">
                                    <div class="product-card standard vid">
                                        <div class="product-media ">
                                            <div class="product-img">
                                                <?
                                                if($hvideo->photo){
                                                    if($hvideo->type == 'youtube'){
                                                        $code = explode('=',$hvideo->url);
                                                        $code = explode('&',$code[1]);
                                                    ?>
                                                    <iframe width="100%" class="d-none"  src="https://www.youtube.com/embed/<?=$code[0];?>" frameborder="0" sandbox allowfullscreen></iframe>
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
                                                        <iframe width="100%" class="d-none"  src="https://www.youtube.com/embed/<?=$code[0];?>" frameborder="0" sandbox allowfullscreen></iframe>
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
                                </div>
                            <?}else{?>
                                <? if(@$Auth->payments[count($Auth->payments) - 1]->package != 'platinum' || @$Auth->payments[count($Auth->payments) - 1]->package != 'gold' || @$Auth->payments[count($Auth->payments) - 1]->status == '0' ){?>
                                    <div class="col-md-3 col-lg-3 col-xl-3 col-xs-6">
                                        <div class="product-card standard vidp">
                                            <div class="product-media ">
                                                <div class="product-img">
                                                    <?
                                                    if($hvideo->photo){
                                                        if($hvideo->type == 'youtube'){
                                                            $code = explode('=',$hvideo->url);
                                                            $code = explode('&',$code[1]);
                                                        ?>

                                                        <?
                                                        }else{ ?>


                                                        <?}?>

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
                                    </div>
                                <?}else{?>
                                        <div class="col-md-3 col-lg-3 col-xl-3 col-xs-6">
                                            <div class="product-card standard vid">
                                                <div class="product-media ">
                                                    <div class="product-img">
                                                        <?
                                                        if($hvideo->photo){
                                                            if($hvideo->type == 'youtube'){
                                                                $code = explode('=',$hvideo->url);
                                                                $code = explode('&',$code[1]);
                                                            ?>
                                                            <iframe width="100%" class="d-none"  src="https://www.youtube.com/embed/<?=$code[0];?>" frameborder="0" sandbox allowfullscreen></iframe>
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
                                                                <iframe width="100%" class="d-none"  src="https://www.youtube.com/embed/<?=$code[0];?>" frameborder="0" sandbox allowfullscreen></iframe>
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
                                        </div>
                                    <?}?>
                                <?}?>
                            <?}?>

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
                        VIDEO LIST PART END
        ===========================================-->
