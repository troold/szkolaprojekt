{include file="header.html.php"}


<div class="content-wrapper">
	<div class="container">
		<div class="row">
			<section class="col-md-12 content">
				<div class="row">
					<div class="col-md-6 col-md-push-3">
						<div class="option btn login">
							<span class="option-title">Zaloguj</span>							
						</div>
						<div class="col-xs-12 option-list login-form" id="slideLogin">
							<div class="input-field" style="display: none">
								<div class="input-text"><span>Login</span></div>
								<div class="input-data"><input id="loginField" type="text" name="login" class="login-credentials"></div>
							</div>
							<div class="input-field" style="display: none">
								<div class="input-text"><span>Hasło</span></div>
								<div class="input-data"><input id="passwdField" type="password" name="password" class="login-credentials"></div>
							</div>
							<div class="submit-field" style="display: none">
								<button class="submit-button" data-type="login">Zaloguj</button>
							</div>
						</div>
						<div class="option btn register">
							<span class="option-title">Zarejestruj</span>							
						</div>
						<div class="col-xs-12 option-list register-form" id="slideRegister">
							<div class="input-field" style="display: none">
								<div class="input-text"><span>Login</span></div>
								<div class="input-data"><input id="loginFieldR" type="text" name="login" class="register-credentials" placeholder="Nazwa użytkownika"></div>
							</div>
							<div class="input-field" style="display: none">
								<div class="input-text"><span>Hasło</span></div>
								<div class="input-data"><input id="passwdFieldR" type="password" name="password" class="register-credentials" placeholder="Hasło">
								<input id="repeatPasswdFieldR" type="password" name="password" class="register-credentials" placeholder="Potwórz hasło"></div>
							</div>
							<div class="input-field" style="display: none">
								<div class="input-text"><span>Email</span></div>
								<div class="input-data"><input id="emailField" type="text" name="email" class="register-credentials" placeholder="Twój email"></div>
							</div>
							<div class="input-field" style="display: none">
								<div class="input-text"><span>Imię</span></div>
								<div class="input-data"><input id="nameField" type="text" name="firstname" class="register-credentials" placeholder="Twoje imię"></div>
							</div>
							<div class="input-field" style="display: none">
								<div class="input-text"><span>Nazwisko</span></div>
								<div class="input-data"><input id="surnameField" type="text" name="surname" class="register-credentials" placeholder="Twoje nazwisko"></div>
							</div>
							<div class="input-field" style="display: none">
								<div class="input-text"><span>Miasto</span></div>
								<div class="input-data"><input id="townField" type="text" name="town" class="register-credentials" placeholder="Miasto zamieszkania"></div>
							</div>
							<div class="submit-field" style="display: none">
								<button class="submit-button" data-type="register">Zarejestruj</button>
							</div>
						</div>
						<div class="option btn information">
							<span class="option-title">Informacje</span>
						</div>
						<div id="slideInfo" class="col-xs-12 option-list information-content">
							<span class="content" style="display: none">Strona została przygotowana przez studenta Jakuba Kubika w&nbsp;ramach zadanego projektu.</span>
						</div>
					</div>
				</div>
			</section>
		</div>
	<!-- /.content -->
	</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
	var animateRunning = false;
	var loginFormOpened = false;
	var registerFormOpened = false;
	var informationOpened = false;

	$('.information').click(function(e){
		if($(e.target).is('span'))
			e.target = $(e.target).parent()[0];

		if(!animateRunning && $(e.target).hasClass('information')){
			animateRunning = true;
			if(!informationOpened){
				toggleInfo(true);
			}else{
				toggleInfo(false);
			}
		}
	});

	$('.login').click(function(e){
		if($(e.target).is('span'))
			e.target = $(e.target).parent()[0];

		if(!animateRunning && $(e.target).hasClass('login')){
			animateRunning = true;
			if(!loginFormOpened){
				if(!registerFormOpened){
					toggleLogin(true);
				}else{
					toggleRegister(false);
					setTimeout(function(){
						toggleLogin(true);
					}, 500)
				}
			}else{
				toggleLogin(false);
			}
		}
	});

	$('.register').click(function(e){
		if($(e.target).is('span'))
			e.target = $(e.target).parent()[0];

		if(!animateRunning && $(e.target).hasClass('register')){
			animateRunning = true;
			if(!registerFormOpened){
				if(!loginFormOpened){
					toggleRegister(true);
				}else{
					toggleLogin(false);					
					setTimeout(function(){
						toggleRegister(true);
					}, 500)
				}
			}else{
				toggleRegister(false);
			}
		}
	});

	function toggleLogin(toggle){
		var target = $('.login-form')[0];
		if(toggle){
		    $('#slideLogin').animate({
		    	height: '+=145'
		    },500, function(){
		    	$(target).find('.input-field').css('display', 'flex');
    			$(target).find('.submit-field').css('display', 'flex');
	    		animateRunning = false;
	    		loginFormOpened = true;
	    	});
		}else{
			$(target).find('.input-field').css('display', 'none');
    		$(target).find('.submit-field').css('display', 'none');
		    $('#slideLogin').animate({
		    	height: '-=145'
		    },500, function(){
	    		animateRunning = false;
	    		loginFormOpened = false;
	    	});
		}
	}

	function toggleRegister(toggle){
		var target = $('.register-form')[0];
		if(toggle){
		    $('#slideRegister').animate({
		    	height: '+=325'
		    },500, function(){
		    	$(target).find('.input-field').css('display', 'flex');
    			$(target).find('.submit-field').css('display', 'flex');
	    		animateRunning = false;
	    		registerFormOpened = true;
	    	});
		}else{
			$(target).find('.input-field').css('display', 'none');
    		$(target).find('.submit-field').css('display', 'none');
			$('#slideRegister').animate({
		    	height: '-=325'
		    },500, function(){
	    		animateRunning = false;
	    		registerFormOpened = false;
	    	});
		}
	}

	function toggleInfo(toggle){
		var target = $('.information-content')[0];
		if(toggle){
			$('#slideInfo').animate({
				height: '+=120'
			}, 500, function(){
				$(target).find('.content').css('display', 'flex');
				animateRunning = false;
				informationOpened = true;
			});
		}else{
			$(target).find('.content').css('display', 'none');
			$('#slideInfo').animate({
				height: '-=120'
			}, 500, function(){				
				animateRunning = false;
				informationOpened = false;
			});
		}
	}

	$('.submit-field').click(function(){
		if($(this).find('button').attr('data-type') == 'login'){
			if($('#loginField').val().length > 0 && $('#passwdField').val().length > 0){
				let targetArray = [];

				$.each($('.login-form').find('input'), function(key, data){
					targetArray.push($(data).val());
				});

				handleUser(targetArray, 'login');
				console.log('finished')
			}
		}else{
			if($('#loginFieldR').val().length > 0 && ($('#passwdFieldR').val().length > 0 && $('#repeatPasswdFieldR').val().length > 0)){
				let targetArray = [];

				$.each($('.register-form').find('input'), function(key, data){
					targetArray.push($(data).val());
				});

				handleUser(targetArray, 'register');
				console.log('finished')
			}
		}
	});

	$('.login-credentials').keypress(function (key) {
		if (key.which == 13) {
			if($('#loginField').val().length > 0 && $('#passwdField').val().length > 0){
				let targetArray = [];

				$.each($('.login-form').find('input'), function(key, data){
					targetArray.push($(data).val());
				});

				handleUser(targetArray, 'login');
				console.log('finished')
				return false;
			}			
		}
	});

	$('.register-credentials').keypress(function (key) {
		if (key.which == 13) {
			if($('#loginFieldR').val().length > 0 && ($('#passwdFieldR').val().length > 0 && $('#repeatPasswdFieldR').val().length > 0)){
				let targetArray = [];

				$.each($('.register-form').find('input'), function(key, data){
					targetArray.push($(data).val());
				});

				handleUser(targetArray, 'register');
				console.log('finished')
			}			
		}
	});

	function handleUser(array, type){
		console.log(array)
		if(type == 'login'){
			$.ajax({
		        url: '{$router->makeUrl("apiv1,users/login")}',
		        type: "POST",
		        data: {
		        	login: array[0],
		        	password: array[1]
		        },
		        success: function success(response) {
		        	console.log(response);
		        	if(response.return == 1)
		        		window.location='{$router->makeUrl("panel,page/index")}';
		        }
		    });
		}else{
			console.log(array)
			if(array[1]==array[2]){
				$.ajax({
		        url: '{$router->makeUrl("apiv1,users/register")}',
		        type: "POST",
		        data: {
		        	login: array[0],
		        	password: array[1],
		        	firstname: array[4],
		        	surname: array[5],
		        	email: array[3],
		        	town: array[6]
		        },
		        success: function success(response) {
		        	console.log(response);
		        	if(response.return == 1){
		        		console.log("Pomyślnie zarejestrowano");
		        		toggleRegister(false);
						setTimeout(function(){
							toggleLogin(true);
						}, 500);
		        	}
		        }
		    });
			}
		}
	}
</script>

{include file="footer.html.php"}