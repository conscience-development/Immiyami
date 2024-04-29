<!-- recommendation content -->

<section class="main quiz-content">
    <div class="container ">
        <div id="quiz_container">
            <div id="quiz-container" class="step_results  recommendation-q">
                <div id="quiz-body" style="display: block;">
                    <div class="quiz-heading">
                        <h2>Smart Recommendation</h2>
                    </div>
                    <?
                    $i = 0;
                    foreach($xmlSubmissionAnswer as $k=>$sa){
                        if($sa->xml_criteria->useForSuggestions == '1'){
                            $arr = [];
                            foreach($sa->xml_criteria->xml_criteria_answers as $ca){
                                $arr[] = ['id'=>$ca->id,'point'=>$ca->point];
                            }
                            usort($arr, function($a, $b) {
                                return $a['point'] <=> $b['point'];
                            });
                            $ansPoint = 0;
                            foreach($arr as $arc){
                                if($arc['id'] == $sa->xml_criteria_answer->id){
                                    $ansPoint = $arc['point'];
                                }
                            }
                            // var_dump((int)$ansPoint);
                            // var_dump((int)$arr[count($arr) - 1]['point']);
                            if((int)$ansPoint < (int)$arr[count($arr) - 1]['point']){
                            $i++;
                        // var_dump($sa);useForSuggestions
                    ?>
                        <div class="quiz_flex">
                            <div class="quiz_num"><?=$i;?>.</div>
                            <div class="quiz_flexfill">
                                <h2><?=$sa->xml_criteria->question;?></h2>
                                <div class="quiz_response"><strong>Your Answer : </strong> <?=$sa->xml_criteria_answer->name;?></div>
                                <div class="quiz_alert quiz_success"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                <?=$sa->xml_criteria_answer->answer;?>
                                </div>
                            </div>
                        </div>
                    <?
                            }
                        }
                    }?>

            </div>
        </div>

    </div>
</section>
