<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <?= $this->element('head') ?>
	<script type="text/javascript" src="//connect.facebook.net/en_US/sdk.js"></script>
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0&appId=1218227518856877&autoLogAppEvents=1" nonce="7x5V3v8g"></script>

				<?= $this->fetch('content') ?>


        <!--=====================================
                    JS LINK PART START
        =======================================-->
        <!-- VENDOR -->
        <script src="/front/js/vendor/jquery-1.12.4.min.js"></script>

        <script src="/front/js/vendor/popper.min.js"></script>
        <script src="/front/js/vendor/bootstrap.min.js"></script>
        <script src="/front/js/vendor/slick.min.js"></script>

		<script src="/front/intl-tel-input-master/build/js/intlTelInput.js"></script>


        <!-- CUSTOM -->

	    <script src="/backend/vendor/select2/js/select2.full.min.js"></script>
        <script src="/front/js/readmore.js"></script>
        <script src="/front/js/waitMe.js"></script>
        <script src="/front/js/custom/slick.js"></script>
        <script src="/front/js/custom/main.js"></script>
        <!--=====================================
                    JS LINK PART END
        =======================================-->
		<!-- <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '804051234805830',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v18.0'
    });
  };
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script> -->


<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '804051234805830',
      cookie     : true,
      xfbml      : true,
      version    : 'v18.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
  
		<script>
$(document).ready(function() {
    $('#countryId').select2({
		placeholder: "Select Your Service Countries",
	});
});
function login() {
	// function checkLoginState() {
  FB.getLoginStatus(function(response2) {
    FB.login(function(response) {
		if (response.authResponse) {
		console.log('Welcome!  Fetching your information.... ');
		FB.api('/me', function(response) {
			var username = response.name;
			var email = response.email;

			var name = username.split(' ');
			$('.email').val(email);
			$('.first_name').val(name[0]);
			$('.last_name').val(name[1]);
			
		console.log('Good to see you, ' + response.name + '.');
		});
		} else {
		console.log('User cancelled login or did not fully authorize.');
		}
	});
  });
// }
	
}
			

// FB.login(function(response) {
//    if (response.authResponse) {
//      console.log('Welcome!  Fetching your information.... ');
//      FB.api('/me', function(response) {
//        console.log('Good to see you, ' + response.name + '.');
//      });
//    } else {
//      console.log('User cancelled login or did not fully authorize.');
//    }
//  });

function handleCredentialResponse(response){
            // console.log(response); 
			// console.log("Encoded JWT ID token: " + response.credential);
			var tokens = response.credential.split(".");
			var payload = JSON.parse(atob(tokens[1]));  
			// console.log(`user id ${payload.sub}`);
			// console.log(`user name ${payload.name}`);
			// console.log(`user email ${payload.email}`);
			// console.log(`user picture ${payload.picture}`);

			var username = payload.name;
			var email = payload.email;

			var name = username.split(' ');
			$('.email').val(email);
			$('.first_name').val(name[0]);
			$('.last_name').val(name[1]);
        }
    
		$(document).ready(function(){
			$(".form-forgot").click(function(){
				$(".form-forgot").removeClass('active');

			});
			$(".form-blogin").click(function(){
				$(".form-blogin").removeClass('active');

			});
		});
		</script>
		<script>
			$(document).ready(function(){
				$('.supplier').hide();
				$('input[name="role"]').on("click", function() {
					var role = $('input[name="role"]:checked').val();
					if(role == 'supplier'){
						$('.member').hide();
						$('.supplier').show();
					}else if(role == 'member'){
						$('.supplier').hide();
						$('.member').show();
					}
				});
				<?
				if($typeOfTab){
				?>
					if('<?php echo $typeOfTab;?>' == 'register'){
						$('#signUpTab').click();
					}
				<?
				}
				?>
				<?
				if($memberPackage){
				?>
					if('<?php echo $memberPackage;?>' == 'supplier'){
						$('#radio2').click();
					}
				<?
				}
				?>

			});
	</script>
	<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
	  nationalMode:false,
	  initialCountry:"LK",

      utilsScript: "/front/intl-tel-input-master/build/js/utils.js",
    });
    var input2 = document.querySelector("#phone2");
    window.intlTelInput(input2, {
	  nationalMode:false,
	  initialCountry:"LK",
      utilsScript: "/front/intl-tel-input-master/build/js/utils.js",
    });
  </script>
   <script type="text/javascript">
            $('.form-alert-mis-match').hide();
            function validateConfPassword() {
                var password = document.getElementById("passM").value;
                var confirmPassword = document.getElementById("passMC").value;
                if (password != confirmPassword) {
                    $('.form-alert-mis-match').show();
                    //alert("Passwords do not match.");
                    return false;
                }
                //return true;
            }

        </script>

</body>
</html>
