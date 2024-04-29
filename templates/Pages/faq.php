<!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
<section class="single-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content">
                    <h2>faq</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">faq</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================
                  SINGLE BANNER PART END
        =======================================-->


<section class="help-part help">
    <div class="container">
        <div class="row content-reverse">
            <div id="accordion">
                <?
                    foreach($helps as $k=>$help){
                ?>
                <div class="card">
                    <div class="card-header" id="heading<?=$k;?>">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?=$k;?>"
                                aria-expanded="<?if($k == '1'){echo 'true';}?>" aria-controls="collapse<?=$k;?>">
                                <?=$help->title;?>
                            </button>
                        </h5>
                    </div>

                    <div id="collapse<?=$k;?>" class="collapse <?if($k == '1'){echo 'show';}?>" aria-labelledby="heading<?=$k;?>" data-parent="#accordion">
                        <div class="card-body">
                        <?=$help->description;?>
                        </div>
                    </div>
                </div>
                <?
                    }
                ?>

            </div>
        </div>
    </div>
    </div>
