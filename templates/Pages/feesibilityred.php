<!-- quiz content -->
<section class="main quiz-content">
    <div class="container">
        <div id="quiz-container" class="step_results">
            <div id="quiz-body" style="display: block;">
                <div class="alert-light">

                    <?
                $color='';
                $points = 0;
                foreach($xmlSubmission->xml_submission_answers as $answers){
                    $points += $answers->xml_criteria_answer->point;
                }

                $pointsArr = [];
                foreach($xmlSubmission->xml_qualification->xml_qualif_points as $k=>$xp){
                    // var_dump($xp);
                    $pointsArr[$k][$xp['color']] = (int)$xp['points'];
                }
                sort($pointsArr);
                foreach($pointsArr as $p){
                    foreach($p as $c=>$pp){
                        // var_dump($c);
                        if($points >= $pp){
                            $color = $c;
                        }else{
                            $color = 'red';
                        }
                    }
                }



            ?>
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="trafficlight">
                                <div class="protector"></div>
                                <div class="protector"></div>
                                <div class="protector"></div>

                                <?

                    if($color == 'Green'){ ?>
                                <div class="color2"
                                    style="    box-shadow: 0 0 20px #111 inset,    0 0 10px #747474;    background: #121212;    background-image: radial-gradient(#1e1e1e, transparent);">
                                </div>
                                <div class="color1"
                                    style="    box-shadow: 0 0 20px #111 inset,    0 0 10px #747474;    background: #121212;    background-image: radial-gradient(#1e1e1e, transparent);">
                                </div>
                                <div class="color"
                                    style="    box-shadow: 0 0 20px #111 inset,    0 0 10px <?=$color;?>;    background: <?=$color;?>;    background-image: radial-gradient(<?=$color;?>, transparent);">
                                </div>

                                <?
                    }elseif($color == 'Orange'){ ?>
                                <div class="color2"
                                    style="    box-shadow: 0 0 20px #111 inset,    0 0 10px #747474;    background: #121212;    background-image: radial-gradient(#1e1e1e, transparent);">
                                </div>
                                <div class="color1"
                                    style="    box-shadow: 0 0 20px #111 inset,    0 0 10px <?=$color;?>;    background: <?=$color;?>;    background-image: radial-gradient(<?=$color;?>, transparent);">
                                </div>
                                <div class="color1"
                                    style="    box-shadow: 0 0 20px #111 inset,    0 0 10px #747474;    background: #121212;    background-image: radial-gradient(#1e1e1e, transparent);">
                                </div>

                                <?
                    }else{ ?>
                                <div class="color2"
                                    style="    box-shadow: 0 0 20px #111 inset,    0 0 10px red;    background: red;    background-image: radial-gradient(<?=$color;?>, transparent);">
                                </div>
                                <div class="color1"
                                    style="    box-shadow: 0 0 20px #111 inset,    0 0 10px #747474;    background: #121212;    background-image: radial-gradient(#1e1e1e, transparent);">
                                </div>
                                <div class="color"
                                    style="    box-shadow: 0 0 20px #111 inset,    0 0 10px #747474;    background: #121212;    background-image: radial-gradient(#1e1e1e, transparent);">
                                </div>
                                <?

                    }

                    ?>

                            </div>
                            <br><br>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <p class="result-c-v"><?=@$countryNameG;?> | <?=@$visatypeNameG;?></p>
                            <!-- <hr> -->

                            <?
                                if($color == 'Green'){ ?>
                            <h2 class="green">Green Light</h2>
                            <h6>Congratulations! ImmiYami gave you a Green Light for Your Journey! This means You're on
                                the right track with qualifications above average based on the answers you've provided.
                            </h6>
                            <?
                                }elseif($color == 'Orange'){ ?>
                            <h2 class="">Yellow Light</h2>
                            <h6>No worries at all, your journey toward migration still holds promise. Your yellow light
                                signals that you're close to the average scores and there's a probability of making your
                                migration dreams a reality. While you might have scored a bit lower than the average,
                                this is not a roadblock – it's a checkpoint for you to explore further and make informed
                                decisions.</h6>
                            <?
                                }else{ ?>
                            <h2 class="red">Red Light</h2>
                            <h6>Don’t worry. You may have selected the wrong country and the Visa type. Sometimes some
                                countries and visa types have many legal obligations, and rules, with many requirements
                                to meet by immigrants. You can still try changing your plan a bit or contacting one of
                                ImmiYami’s experts by taking part in our membership program. Our membership program
                                assists you with expert support and guidance, reliable service providers in the
                                classifieds section, and more</h6>
                            <?
                                }
                                ?>

                            <p><br>
                                <?
                                if($color == 'Green'){ ?>
                                Now start chasing your migrating dream. Make it happen with our classifieds section. It
                                has many reliable service providers supplying every service for you. Also, don’t forget
                                to take part in our membership program that unlocks exclusive programs for you. Why
                                wait? Join now and start flying to your dreams. <br><br>
                                <?
                                }elseif($color == 'Orange'){ ?>
                                This yellow light invites you to fix some simple things to make your migration happen.
                                You still can contact one of ImmiYami experts by taking part in our membership program.
                                Our membership program assists you with expert support and guidance, reliable service
                                providers in the classifieds section, and more. Hurry up! Switch your Yellow light to a
                                green and fly to your dream.<br><br>
                                <?
                                }else{ ?>
                                <?
                                }
                                ?>


                            </p>
                            <p>Is there anything else bothering you? </p>


                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="fees-box-r"><img src="/front/images/sack-dollar.png" alt="">
                                        <p>IELTS Classes</p>
                                    </div>
                                    <!-- <button class="lightGreenBtn"><i class="fa fa-play" aria-hidden="true"></i> Show Funds Services</button> -->
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <!-- <button class="lightGreenBtn"><i class="fa fa-play" aria-hidden="true"></i> Mock Visa Interviews</button> -->
                                    <div class="fees-box-r"><img src="/front/images/memo-circle-check.png" alt="">
                                        <p>Visa Interview Tips</p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <!-- <button class="lightGreenBtn"><i class="fa fa-play" aria-hidden="true"></i> Complete the Visa Guide</button> -->
                                    <div class="fees-box-r"><img src="/front/images/chalkboard-user.png" alt="">
                                        <p>Visa checklist</p>
                                    </div>
                                </div>

                                <? if(@$memberPackage == 'platinum' || @$memberPackage == 'paid'){ ?>

                                <?}else{?>
                                <div class="col-md-12 col-sm-12">
                                    <? if($Offer50Show){ ?>
                                    <a href="/active-free-membership"><button class="lightBlurBtn">Activate your free
                                            membership</button></a>

                                    <?}?>
                                    <br><br>
                                </div>
                                <?}?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="blog-sidebar">
                                <div class="blog-sidebar-title">
                                    <a href="/list-posts">
                                        <h6>Classifieds</h6>
                                    </a>
                                </div>
                                <ul class="blog-suggest">
                                    <? foreach($posts as $article){?>
                                    <li>
                                        <div class="suggest-img">
                                            <a
                                                href="/post-view?post_id=<?=preg_replace('/[^\da-z]/i', '-', $article->title);?>-<?=$article->id;?>">
                                                <?php
                                                        if($article->photo_dir){ ?>
                                                <img src="/files/posts/photo/<?=$article->photo_dir;?>/<?=$article->photo;?>"
                                                    alt="<?=$article->title;?>">

                                                <?php    }else{ ?>
                                                <img src="/front/images/news.jpg">

                                                <?php    } ?>

                                            </a>
                                        </div>
                                        <div class="suggest-content">
                                            <div class="suggest-title">
                                                <h4>
                                                    <a
                                                        href="/post-view?post_id=<?=preg_replace('/[^\da-z]/i', '-', $article->title);?>-<?=$article->id;?>"><?=substr_replace($article->title, "...", 30)?>
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                    </li>
                                    <? } ?>

                                </ul>
                                <div class="blog-sidebar-footer">
                                    <a href="/list-posts">
                                        <button class="btn btn-inline view-m">View More</button>
                                    </a>
                                </div>
                            </div>

                        </div>



                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <? if(@$memberPackage == 'platinum' || @$memberPackage == 'paid'){ ?>

                        <?}else{?>
                        <br><br>
                        <h2 class="text-left  color-black">Upgrade your membership for better chances
                        </h2><br><br>
                        <?= $this->element('membershipDataFeesRed') ?>
                        <?}?>

                    </div>

                </div>
            </div>

            <div id="quiz-buttons" role="group">
                <? if(@$memberPackage == 'platinum' || @$memberPackage == 'paid'){ ?>
                <button class="quiz_btn-r" onclick="location.href = '/';"><i class="fa fa-repeat"
                        aria-hidden="true"></i>Back to the top</button>
                <button class="quiz_btn-r" onclick="location.href = '/recommendation';"><i class="fa fa-repeat"
                        aria-hidden="true"></i>Smart Recommendations</button>

                <?}?>
            </div>
        </div>
    </div>
</section>