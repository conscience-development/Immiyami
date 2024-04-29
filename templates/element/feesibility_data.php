<?php
function minifier($code) {
    $search = array(

        // Remove whitespaces after tags
        '/\>[^\S ]+/s',

        // Remove whitespaces before tags
        '/[^\S ]+\</s',

        // Remove multiple whitespace sequences
        '/(\s)+/s',

        // Removes comments
        '/<!--(.|\s)*?-->/'
    );
    $replace = array('>', '<', '\\1');
    $code = preg_replace($search, $replace, $code);
    return $code;
}
?>

<script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }

        setTimeout("preventBack()", 0);

        window.onunload = function () { null };
    </script>

<script>
$(document).ready(function(){

    var from = document.referrer;
console.log(from);

    $('#backBtn-pp').attr('href',from);

    $("#nextBtn-pp button"). attr("disabled", true);
    $('.pick-ans').click(function(){
        // $('#modelLogin').modal('hide');
        $("#nextBtn-pp button"). attr("disabled", false);
        $('.pick-ans button').removeClass("active");
        $(this).find('button').addClass("active");
        var hrefKey = $(this).attr('hrefKey');
        $('#nextBtn-pp').attr('href',hrefKey);

    });
    // var hash = window.location.hash;
    // console.log(hash);

    window.onpopstate = function(event)
    {
        //alert("location: " + document.location + ", state: " + JSON.stringify(event.state));
        var hash = window.location.hash;

        if(hash != '#results'){
            $('#modelLogin').modal('hide');
        }
    };
    
    
	<? if(empty($qualificationName)){?>
	$('#modelPickCountry').on('show.bs.modal', function () {
        var modbody = $('.modelfees');
        $('.quiz-content').html(modbody);
    });
	// $('#modelPickCountry').modal();
    $('#modelPickCountry').modal({
                backdrop: 'static',
                keyboard: false
                }); 
	<?}else{?>

	var pathJson = window.location.pathname.replace(/\/[^\/]+?\.[^\/]+?$/, '/');

    // Get a cookie
    function getCookieQ(name)
    {
        var nameEQ = name + '=';
        var ca = document.cookie.split(';');

        for(var i = 0; i < ca.length; i++){

            var c = ca[i];

            while(c.charAt(0) == ' '){

                c = c.substring(1, c.length);
            }

            if(c.indexOf(nameEQ) == 0){

                return c.substring(nameEQ.length, c.length);
            }
        }

        return null;
    }
    // Delete a cookie
    function eraseCookieQ(name)
    {
        document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }

	$('#quiz_container').quiz({
		quizJson: "/XmlSheets/quizjson/<?=@$qualificationName?>",
		onResults: function(good, total,questions){
			var qDataR = JSON.parse(getCookieQ('quiz_responses'));

            $('#fees-details').html('');
            //console.log(questions[0]);
            var datasetArr = [];
            //var html = '';
            var i = 0;
            $.each(qDataR, function(c, p){
                var q = c.split('_');
                var getQ = questions[q[1]];
                datasetArr.push({'q' : getQ.id,'a': getQ.answers[p].id});
                i++;
            });
            var token = $("meta[name='ImmiToken']").attr("content");
            var returnST = '';
            $.ajax({
                headers: {
                    'X-CSRF-Token': token
                    },
                type: "POST",
                data: {dataset:datasetArr},
                url: "/XmlSubmissions/addDataAjex",
                success: function(msg){
                 console.log(msg);
                 if(msg == 'rediret'){
                    $('.main.quiz-content').css('padding','0px');
                    $('#quiz_container').html('');

                    


                    // $('#modelLogin').modal({
                    //     backdrop: 'static',
                    //     keyboard: false
                    //     });
                    var login = '';
                    login += '<div class="row mt-5">';
                    login += '    <div class="col-xs-12 col-sm-4 col-md-4">';
                    login += '        <img src="/front/images/quiz/reg.png" alt="" class="width-100">';
                    login += '    </div>';
                    login += '    <div class="col-xs-12 col-sm-8 col-md-8">';
                    login += '        <h2 class="mb-3">Register For Free</h2>';
                    login += '        <p>By registering, you`re not only gaining access to see your results, but you`re also opening a door to a world of knowledge, guidance, and personalized recommendations that can shape your path forward. ImmiYami guides our registered users through the further process if you are well qualified, but if you are not, our experts will let you know other options.</p>';
                    login += '        <br>';
                    login += '        <p class="setBold">To view your results, simply &nbsp <a href="/Users/login?type=register&package=free"> register for free</a></p>';
                    login += '    </div>';
                    login += '</div>';
                    
                    $('#fees-details').append(login);
                    $( "body" ).scrollTop( 0 );
                    document.body.scrollTop = document.documentElement.scrollTop = 0;
                    return;
                    //window.location.href = "/users/login";
                 }

                }
            });
            console.log(datasetArr);
            $('#quiz-body').html();
            $('#quiz-buttons').html();



			// var alert = $('<div class="alert"></div>')
            if(returnST == 'rediret'){
                var alert ='';
            }else{
                var alert = $('<div class="alert-light"></div>')
				.prependTo($(this).find('#quiz-body'));
            }


            $.each(questions[0].point, function(c, p){
                $.each(p, function(cc, pp){
                    // console.log(cc);
                    // console.log(pp);

                    var green = '';
                    var orange = '';
                    var red = '';



                    if(good >= pp){

                        var light = '';
                        // var html = '';


                        light += '<div class="row">';
                        light += '<div class="col-md-3 col-sm-12">';
                        light += '<div class="trafficlight">';
                        light += '<div class="protector"></div>';
                        light += '<div class="protector"></div>';
                        light += '<div class="protector"></div>';

                        if(cc == 'Green'){
                            light += '    <div class="color2" style="';
                            light += '    box-shadow: 0 0 20px #111 inset,';
                            light += '    0 0 10px #747474;';
                            light += '    background: #121212;';
                            light += '    background-image: radial-gradient(#1e1e1e, transparent);';
                            light += '"></div>';
                            light += '    <div class="color1" style="';
                            light += '    box-shadow: 0 0 20px #111 inset,';
                            light += '    0 0 10px #747474;';
                            light += '    background: #121212;';
                            light += '    background-image: radial-gradient(#1e1e1e, transparent);';
                            light += '"></div>';
                            light += '    <div class="color" style="';
                            light += '    box-shadow: 0 0 20px #111 inset,';
                            light += '    0 0 10px '+cc+';';
                            light += '    background: '+cc+';';
                            light += '    background-image: radial-gradient('+cc+', transparent);';
                            light += '"></div>';
                        }else if(cc == 'Orange'){
                            light += '    <div class="color2" style="';
                            light += '    box-shadow: 0 0 20px #111 inset,';
                            light += '    0 0 10px #747474;';
                            light += '    background: #121212;';
                            light += '    background-image: radial-gradient(#1e1e1e, transparent);';
                            light += '"></div>';
                            light += '    <div class="color1" style="';
                            light += '    box-shadow: 0 0 20px #111 inset,';
                            light += '    0 0 10px '+cc+';';
                            light += '    background: '+cc+';';
                            light += '    background-image: radial-gradient('+cc+', transparent);';
                            light += '"></div>';
                            light += '    <div class="color" style="';
                            light += '    box-shadow: 0 0 20px #111 inset,';
                            light += '    0 0 10px #747474;';
                            light += '    background: #121212;';
                            light += '    background-image: radial-gradient(#1e1e1e, transparent);';
                            light += '"></div>';
                        }else{
                            light += '    <div class="color2" style="';
                            light += '    box-shadow: 0 0 20px #111 inset,';
                            light += '    0 0 10px '+cc+';';
                            light += '    background: '+cc+';';
                            light += '    background-image: radial-gradient('+cc+', transparent);';
                            light += '"></div>';
                            light += '    <div class="color1" style="';
                            light += '    box-shadow: 0 0 20px #111 inset,';
                            light += '    0 0 10px #747474;';
                            light += '    background: #121212;';
                            light += '    background-image: radial-gradient(#1e1e1e, transparent);';
                            light += '"></div>';
                            light += '    <div class="color" style="';
                            light += '    box-shadow: 0 0 20px #111 inset,';
                            light += '    0 0 10px #747474;';
                            light += '    background: #121212;';
                            light += '    background-image: radial-gradient(#1e1e1e, transparent);';
                            light += '"></div>';
                        }



                        light += '</div>';
                        light += '</div>';
                        light += '<div class="col-md-6 col-sm-12">';
                        light += '<p class="result-c-v"><?=@$countryNameG;?> | <?=@$visatypeNameG;?></p>';
                        // light += '<hr>';
                        if(cc == 'Green'){
                            light += '<h2  class="green">Green Light</h2>';
                            light += '<h6>Congratulations! ImmiYami gave you a Green Light for Your Journey! This means Youre on the right track with qualifications above average based on the answers youve provided.</h6<br><br>';
                        }else if(cc == 'Orange'){
                            
                            light += '<h2  class="orange">Yellow Light</h2>';
                            light += '<h6>No worries at all, your journey toward migration still holds promise. Your yellow light signals that youre close to the average scores and theres a probability of making your migration dreams a reality. While you might have scored a bit lower than the average, this is not a roadblock – its a checkpoint for you to explore further and make informed decisions.</h6><br><br>';
                        }else{
                            
                            light += '<h2  class="red">Red Light</h2>';
                            light += '<h6>Don’t worry. You may have selected the wrong country and the Visa type. Sometimes some countries and visa types have many legal obligations, and rules, with many requirements to meet by immigrants. You can still try changing your plan a bit or contacting one of ImmiYami’s experts by taking part in our membership program. Our membership program assists you with expert support and guidance, reliable service providers in the classifieds section, and more</h6><br><br>';
                        }
                        light += '<p><br>';
                        if(cc == 'Green'){
                            light += 'Now start chasing your migrating dream. Make it happen with our classifieds section. It has many reliable service providers supplying every service for you. Also, don’t forget to take part in our membership program that unlocks exclusive programs for you. Why wait? Join now and start flying to your dreams. <br><br>';
                        }else if(cc == 'Orange'){
                            light += 'This yellow light invites you to fix some simple things to make your migration happen. You still can contact one of ImmiYami experts by taking part in our membership program. Our membership program assists you with expert support and guidance, reliable service providers in the classifieds section, and more. Hurry up! Switch your Yellow light to a green and fly to your dream.<br><br>';
                        }else{
                            // light += '<span class="red"><b>Red light</b></span> : It means your <b>chances are less likely</b>, but you could still improve your chances by adding more skills and improving your profile.<br><br>';
                        }
                        light += 'Is there anything else bothering you ?</p>';
                        // light += 'Get ready to live your overseas dream! Our classifieds section has the reliable service providers you need to make it happen. And with our membership program, you will get exclusive access to even more opportunities. Do not wait - join now and make your dreams a reality!</p>';
                        
                        light += '<div class="row">';
                        light += '<div class="col-md-4 col-sm-12">';
                        light += '<div class="fees-box-r"><img src="/front/images/chalkboard-user.png" alt=""><p>IELTS Classes</p></div>';
                        // light += '<button class="lightGreenBtn"><i class="fa fa-play" aria-hidden="true"></i> Show Funds Services</button>';
                        light += '</div>';
                        light += '<div class="col-md-4 col-sm-12">';
                        light += '<div class="fees-box-r"><img src="/front/images/memo-circle-check.png" alt=""><p>Mock Interviews</p></div>';
                        // light += '<button class="lightGreenBtn"><i class="fa fa-play" aria-hidden="true"></i> Visa Interview Tips</button>';
                        
                        light += '</div>';
                        light += '<div class="col-md-4 col-sm-12">';
                        light += '<div class="fees-box-r"><img src="/front/images/chalkboard-user.png" alt=""><p>Visa checklist</p></div>';
                        // light += '<button class="lightGreenBtn"><i class="fa fa-play" aria-hidden="true"></i> Complete the Visa Guide</button>';
                        
                        light += '</div>';
                        <? if(@$memberPackage == 'platinum' || @$memberPackage == 'paid'){}else{ ?>
                        light += '<div class="col-md-12 col-sm-12">'; 
                        <? if($Offer50Show){ ?>  
                            light += '<a href="/active-free-membership"><button class="lightBlurBtn">Activate your free membership</button></a>';
                        <?}?>
                        light += '</div>';
                        <?}?>
                        light += '</div>';

                        light += '</div>';
                        
                        light += '<div class="col-md-3 col-sm-12">';
                        light += '        <div class="blog-sidebar">';
                        light += '            <div class="blog-sidebar-title">';
                        light += '                <a href="/list-posts"><h6>Classifieds</h6></a>';
                        light += '            </div>';
                        light += '            <ul class="blog-suggest">'; 
										<? foreach($posts as $article){?>
                        light += '                <li>';
                        light += '                    <div class="suggest-img">';
                        light += '                        <a href="/post-view?post_id=<?=preg_replace('/[^\da-z]/i', '-', $article->title);?>-<?=$article->id;?>">';
												<?php
                                                        if($article->photo_dir){ ?>
                        light += '                                 <img src="/files/posts/photo/<?=$article->photo_dir;?>/<?=$article->photo;?>" alt="<?=$article->title;?>">';

                                                <?php    }else{ ?>
                        light += '                                <img src="/front/images/news.jpg">';

                                                <?php    } ?>

                        light += '                        </a>';
                        light += '                    </div>';
                        light += '                    <div class="suggest-content">';
                        light += '                        <div class="suggest-title">';
                        light += '                            <h4>';
						light += '								<a href="/post-view?post_id=<?=preg_replace('/[^\da-z]/i', '-', $article->title);?>-<?=$article->id;?>"><?=substr_replace($article->title, "...", 30)?>';
						light += '								</a>';
						light += '							</h4>';
                        light += '                        </div>';
                        light += '                    </div>';
                        light += '                </li>';
                                        <? } ?>

                        light += '            </ul>';
                        light += '            <div class="blog-sidebar-footer"><a href="/list-posts"><button class="btn btn-inline view-m">View More</button></a></div>';
                        light += '        </div>';

                        light += '</div>';

                        light += '</div>';
                        light += '</br>';
                        light += '</br>';
                        <? //  if(@$memberPackage == 'platinum' || @$memberPackage == 'paid'){}else{ ?>
                        //html +=        '<h2 class="text-center">Upgrade your membership for Gold for Platinum for better chances</h2><br><br><?

                        //echo minifier($this->element('membershipData')); ?>';
                        <? //}?>
                        <? if($Auth){ ?>
                            alert.html(light);
                        <? } ?>
                        // alert.addClass('alert-success-qu').css("background-color",cc)
                        // .html('You have '+ good +' Points');
                    }else{
                        var light = '';
                        // var html = '';
                        light += '<div class="row">';
                        light += '<div class="col-md-3 col-sm-12">';
                        light += '<div class="trafficlight">';
                        light += '<div class="protector"></div>';
                        light += '<div class="protector"></div>';
                        light += '<div class="protector"></div>';
                        light += '    <div class="color2" style="';
                        light += '    box-shadow: 0 0 20px #111 inset,';
                        light += '    0 0 10px red;';
                        light += '    background: red;';
                        light += '    background-image: radial-gradient(red, transparent);';
                        light += '"></div>';
                        light += '    <div class="color1" style="';
                        light += '    box-shadow: 0 0 20px #111 inset,';
                        light += '    0 0 10px #747474;';
                        light += '    background: #121212;';
                        light += '    background-image: radial-gradient(#1e1e1e, transparent);';
                        light += '"></div>';
                        light += '    <div class="color" style="';
                        light += '    box-shadow: 0 0 20px #111 inset,';
                        light += '    0 0 10px #747474;';
                        light += '    background: #121212;';
                        light += '    background-image: radial-gradient(#1e1e1e, transparent);';
                        light += '"></div>';
                        light += '</div>';
                        light += '</br>';
                        light += '</br>';
                        light += '</div>';
                        light += '<div class="col-md-6 col-sm-12">';
                        light += '<p class="result-c-v"><?=@$countryNameG;?> | <?=@$visatypeNameG;?></p>';
                        // light += '<hr>';
                        light += '<h2 class="red">Red Light</h2>';
                        light += '<h6>Don’t worry. You may have selected the wrong country and the Visa type. Sometimes some countries and visa types have many legal obligations, and rules, with many requirements to meet by immigrants. You can still try changing your plan a bit or contacting one of ImmiYami’s experts by taking part in our membership program. Our membership program assists you with expert support and guidance, reliable service providers in the classifieds section, and more</h6>';
                        light += '<p><br>';
                        // if(cc == 'Green'){
                            // light += '<span class="green"><b>Green light</b></span> : It means your <b>chances are above average</b>, and you may have a good chance of successfully migrating to another country.<br><br>';
                        // }else if(cc == 'Orange'){
                            // light += '<span class="Orange"><b>Orange light</b></span> : It means your <b>chances are average</b>, but you could improve your chances by acquiring more skills or improving your profile.<br><br>';
                        // }else{
                            // light += '<span class="red"><b>Red light</b></span> : It means your <b>chances are less likely</b>, but you could still improve your chances by adding more skills and improving your profile.<br><br>';
                        // }
                        // light += 'Get ready to live your overseas dream! Our classifieds section has the reliable service providers you need to make it happen. And with our membership program, you will get exclusive access to even more opportunities. Do not wait - join now and make your dreams a reality!</p>';
                        
                        light += 'Is there anything else bothering you? </p>';


                        light += '<div class="row">';
                        light += '<div class="col-md-4 col-sm-12">';
                        // light += '<button class="lightGreenBtn"><i class="fa fa-play" aria-hidden="true"></i> Show Funds Services</button>';
                        light += '<div class="fees-box-r"><img src="/front/images/sack-dollar.png" alt=""><p>IELTS Classes</p></div>';
                        light += '</div>';
                        light += '<div class="col-md-4 col-sm-12">';
                        // light += '<button class="lightGreenBtn"><i class="fa fa-play" aria-hidden="true"></i> Visa Interview Tips</button>';
                        
                        light += '<div class="fees-box-r"><img src="/front/images/memo-circle-check.png" alt=""><p>Mock Interviews</p></div>';
                        light += '</div>';
                        light += '<div class="col-md-4 col-sm-12">';
                        // light += '<button class="lightGreenBtn"><i class="fa fa-play" aria-hidden="true"></i> Complete the Visa Guide</button>';
                        
                        light += '<div class="fees-box-r"><img src="/front/images/chalkboard-user.png" alt=""><p>Visa checklist</p></div>';
                        light += '</div>';
                        <? if(@$memberPackage == 'platinum' || @$memberPackage == 'paid'){}else{ ?>
                        light += '<div class="col-md-12 col-sm-12">';
                        <? if($Offer50Show){ ?> 
                        light += '<a href="/active-free-membership"><button class="lightBlurBtn">Activate your free membership</button></a>';
                        <?}?>
                        light += '</div>';
                        <?}?>
                        light += '</div>';
                        
                        light += '</div>';

                        
                        light += '<div class="col-md-3 col-sm-12">';
                        light += '        <div class="blog-sidebar">';
                        light += '            <div class="blog-sidebar-title">';
                        light += '                <a href="/list-posts"><h6>Classifieds</h6></a>';
                        light += '            </div>';
                        light += '            <ul class="blog-suggest">';
										<? foreach($posts as $article){?>
                        light += '                <li>';
                        light += '                    <div class="suggest-img">';
                        light += '                        <a href="/post-view?post_id=<?=preg_replace('/[^\da-z]/i', '-', $article->title);?>-<?=$article->id;?>">';
												<?php
                                                        if($article->photo_dir){ ?>
                        light += '                                 <img src="/files/posts/photo/<?=$article->photo_dir;?>/<?=$article->photo;?>" alt="<?=$article->title;?>">';

                                                <?php    }else{ ?>
                        light += '                                <img src="/front/images/news.jpg">';

                                                <?php    } ?>

                        light += '                        </a>';
                        light += '                    </div>';
                        light += '                    <div class="suggest-content">';
                        light += '                        <div class="suggest-title">';
                        light += '                            <h4>';
						light += '								<a href="/post-view?post_id=<?=preg_replace('/[^\da-z]/i', '-', $article->title);?>-<?=$article->id;?>"><?=substr_replace($article->title, "...", 30)?>';
						light += '								</a>';
						light += '							</h4>';
                        light += '                        </div>';
                        light += '                    </div>';
                        light += '                </li>';
                                        <? } ?>

                        light += '            </ul>';
                        light += '            <div class="blog-sidebar-footer"><a href="/list-posts"><button class="btn btn-inline view-m">View More</button></a></div>';
                        light += '        </div>';

                        light += '</div>';

                        light += '</div>';
                        light += '</br>';
                        light += '</br>';

                         <? //if(@$memberPackage == 'platinum' || @$memberPackage == 'paid'){}else{ ?>
                        // html +=        '<h2 class="text-center">Upgrade your membership for Gold for Platinum for better chances</h2><br><br><?

                        // echo minifier($this->element('membershipDataFees')); ?>';
                         <? //}?>

                        <? if($Auth){ ?>
                            alert.html(light);
                        <? } ?>

                    }
                });
            });
            eraseCookieQ('quiz_responses');
            console.log(html);
            if(html){}else{
                var html = '';
            }
            //var html = '';

            var home = "'"+"/feesibility"+"'";
            var rec = "'"+"/recommendation"+"'";

            <? if(@$memberPackage == 'platinum' || @$memberPackage == 'paid'){ ?>

                html +=        '<button class="quiz_btn-r" onclick="location.href = '+home+';" >';
                html +=           '<i class="fa fa-repeat" aria-hidden="true"></i>Back to the top';
                html +=        '</button>';
                html +=        '<button class="quiz_btn-r" onclick="location.href = '+rec+';" >';
                html +=           '<i class="fa fa-repeat" aria-hidden="true"></i>Smart Recommendations';
                html +=        '</button>';

            <? }else{?>



        <? if(@$memberPackage == 'platinum' || @$memberPackage == 'paid'){}else{ ?>
                html +=        '<h2 class="text-left color-black">Upgrade your membership for better chances</h2><br><br><?

                echo minifier($this->element('membershipDataFees')); ?>';
                
                <? }?>

                html +=        '<button class="quiz_btn-r mt-5" onclick="location.href = '+home+';" >';
                html +=           '<i class="fa fa-repeat" aria-hidden="true"></i>Back to the top';
                html +=        '</button>';

            <? }?>
            <? if($Auth){ ?>
                $('#quiz-buttons').append(html);
            <? } ?>

			// if(good == 0){

			// 	alert.addClass('alert-danger')
			// 		.html('All wrong! You didn\'t get an answer right. Go take up knitting!');
			// } else if(perc > 0 && perc <= 0.25){

			// 	alert.addClass('alert-danger')
			// 		.html('Poor result! You only got ' + good + ' out of ' + total + ' answers right. Please try again.');
			// } else if(perc > 0.25 && perc <= 0.5){

			// 	alert.addClass('alert-danger')
			// 		.html('Just enough! You got ' + good + ' out of ' + total + ' answers right. You can do better.');
			// } else if(perc > 0.5 && perc <= 0.75){

			// 	alert.addClass('alert-success')
			// 		.html('Decent result! You got ' + good + ' out of ' + total + ' answers right. Please try again.');
			// } else if(perc > 0.75 && perc < 1){

			// 	alert.addClass('alert-success')
			// 		.html('Good result! You got ' + good + ' out of ' + total + ' answers right. I think we\'re nearly there.');
			// } else if(perc == 1){

			// 	alert.addClass('alert-success')
			// 		.html('Congratulations, you have answered all the questions!');
			// } 
		}
	});
	<?}?>
});
</script>
