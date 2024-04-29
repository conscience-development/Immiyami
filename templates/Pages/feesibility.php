<!-- quiz content -->
<section class="main quiz-content">
    <div class="container">
        <div class="row" id="fees-details">

            <!-- <br>
      <br>
      <div class="col-xs-12 col-sm-6 col-md-6">
                <h2 class="mb-3">Immiyami Feasibility Quiz</h2>
                <p>The experiences and the knowledge of the founders of ImmiYami lead to creating this quiz just for you! This quiz is your compass, guiding you toward a clearer understanding of the opportunities that align with your dreams in a few steps. It's not just a quiz but it's a pathway to realizing your goals and mapping out the possibilities that await you.</p>

            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <img src="/front/images/quiz/start.png" alt="" class="width-100">
            </div> -->
        </div>
        <hr>
        <div id="quiz_container"></div>

    </div>
</section>

<div class="modal fade modelfees" id="modelPickCountry">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="quiz_flex">
                <div class="quiz_flexfill">
                    <? if(empty($countryName) && empty($visatypeName)){ ?>

                    <div class="county-selection-model">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h2>Select Your Country</h2>
                                <p>The world is your oyster, and this is your golden key. Simply close your eyes and
                                    envision your ideal path. Pick your dream destination, and let life's grand
                                    adventure begin!</p>

                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <img src="/front/images/quiz/country.png" alt="" class="width-100">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h2 class="text-center">Select your preferred country ?</h2>
                    <div class="row">
                        <?
					foreach($xmlCountries as $k=>$xmlCont){
					?>


                        <div class="quiz_radiogroup col-12 col-sm-4">
                            <div role="group">
                                <a href="/feesibility?countryName=<?=@$xmlCont->name.'-'.$xmlCont->id;?>"
                                    class="pick-ans">
                                    <button class="quiz_btn width-100">
                                        <? if($xmlCont->imglink){?>
                                        <img src="<?=$xmlCont->imglink;?>" class="flagimgf" /><i
                                            class="fa fa-circle"></i>
                                        <?}?>
                                        <?=@$xmlCont->name;?>
                                    </button>

                                </a>
                            </div>
                        </div>

                        <?}?>

                    </div>
                    <br>
                    <hr>
                    <?}elseif(!empty($countryName)){?>

                    <div class="visa-selection-model">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h2>Select Your Visa Type</h2>
                                <p>Your visa is the getaway to your dream. Remember, each visa type has its own set of
                                    requirements, obligations, and opportunities. Don't worry! We are with you for
                                    everything!</p>

                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <img src="/front/images/quiz/visa.png" alt="" class="width-100">
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <h2 class="text-center" class="text-center">Select your visa type</h2>
                    <div class="row">
                        <?
                  foreach($xmlVisatypes as $k=>$xmlCont){
                  ?>
                        <div class="quiz_radiogroup col-6 col-sm-3">
                            <div role="group">
                                <a href="/feesibility?visatypeName=<?=@$xmlCont.'-'.$k;?>" class="pick-ans"><button
                                        class="quiz_btn width-100"><?=@$xmlCont;?></button></a>
                            </div>
                        </div>
                        <?}?>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <?}elseif(!empty($visatypeName)){?>
                    <?
                        if($xmlQualificationsNone != ' None'){?>


                    <div class="visa-selection-model">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h2>Select your Category</h2>
                                <p>You are standing on the threshold of your educational journey, but your pursuit
                                    doesn't stop. It almost reveals the enthusiastic person in you. Keep pursuing your
                                    dreams. Warmest Wishes from Immiyami, where dreams take flight!</p>

                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <img src="/front/images/quiz/cat.png" alt="" class="width-100">
                            </div>
                        </div>
                    </div>
                    <hr>


                    <h2 class="text-center">Select your preferred category ?</h2>
                    <div class="row">
                        <?
                        foreach($xmlQualifications as $k=>$xmlCont){
                        ?>
                        <div class="quiz_radiogroup col-6 col-sm-4">
                            <div role="group">
                                <a href="/feesibility?qualificationName=<?=@$xmlCont.'-'.$k;?>" class="pick-ans"><button
                                        class="quiz_btn width-100"><?=@$xmlCont;?></button></a>
                            </div>
                        </div>
                        <?}?>
                    </div>
                    <br>
                    <?}?>
                    <?}else{?>

                    <?}?>
                    <!-- <div class="row d-block text-center bottom-n-b-btn mb-5">
                        <div class="col-xs-12 d-inline-flex">
                            <? if(!empty($countryName)){ ?>
                            <a href="/feesibility"><button class="quiz_btn width-100 hide"><i class="fa fa-chevron-left" aria-hidden="true"></i> Previous</button></a>
                            <? }else if(!empty($visatypeName)){ ?>
                              <a href="" id="backBtn-pp"><button class="quiz_btn width-100 hide"><i class="fa fa-chevron-left" aria-hidden="true"></i> Previous</button></a>
                            <? }else if(!empty($qualificationName)){ ?>
                              <a href="" id="backBtn-pp"><button class="quiz_btn width-100 hide"><i class="fa fa-chevron-left" aria-hidden="true"></i> Previous</button></a>
                            <?}else{?>
                            <?}?>
                            <a href="" id="nextBtn-pp"><button class="quiz_btn width-100">Next <i class="fa fa-chevron-right" aria-hidden="true"></i></button></a>
                        </div>
                    </div> -->
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <div class="modal fade modelfees" id="modelLogin">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="row">
            
            <div class="col-xs-12 col-sm-4 col-md-4">
                <img src="/front/images/quiz/reg.png" alt="" class="width-100">
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8">
                <h2>Register For Free</h2>
                <p>By registering, you're not only gaining access to see your results, but you're also opening a door to a world of knowledge, guidance, and personalized recommendations that can shape your path forward. ImmiYami guides our registered users through the further process if you are well qualified, but if you are not, our experts will let you know other options.</p>
                <br>
                <p class="d-inline-flex">To view your results, simply &nbsp <a href="/Users/login?type=register&package=free"> register for free</a></p>
            </div>
        </div>
        </div>
    </div>
</div> -->