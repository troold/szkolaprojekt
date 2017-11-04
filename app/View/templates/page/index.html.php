{include file="header.html.php"}


<div class="content-wrapper">
	<div class="container">
		<div class="row">
			<section class="col-md-12 content">
				<div class="row">
					<div class="col-md-6 col-md-push-3">
						<div class="option btn login">
							<span>Zaloguj</span>
							<div class="inner-form login-form" action="" id="slideLogin" style="display: none;">
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
						</div>
						<div class="option btn register">
							<span>Zarejestruj</span>
							<div class="inner-form register-form" action="" id="slideRegister" style="display: none;">
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
									<div class="input-data"><input id="emailField" type="text" name="login" class="register-credentials" placeholder="Twój email"></div>
								</div>
								<div class="input-field" style="display: none">
									<div class="input-text"><span>Imię</span></div>
									<div class="input-data"><input id="nameField" type="text" name="login" class="register-credentials" placeholder="Twoje imię"></div>
								</div>
								<div class="input-field" style="display: none">
									<div class="input-text"><span>Nazwisko</span></div>
									<div class="input-data"><input id="surnameField" type="text" name="login" class="register-credentials" placeholder="Twoje nazwisko"></div>
								</div>
								<div class="input-field" style="display: none">
									<div class="input-text"><span>Miasto</span></div>
									<div class="input-data"><input id="townField" type="text" name="login" class="register-credentials" placeholder="Miasto zamieszkania"></div>
								</div>
								<div class="submit-field" style="display: none">
									<button class="submit-button" data-type="register">Zarejestruj</button>
								</div>
							</div>
						</div>
						<div class="option btn">
							<span>Informacje</span>
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

	$('.login').click(function(e){
		if(!animateRunning && $(e.target).hasClass('login')){
			animateRunning = true;
			if($(e.target).find('.inner-form').css('display') == 'none'){
				if(!registerFormOpened){
					toggleLogin(this, e.target, true);
				}else{
					toggleRegister($('.register'), e.target, false);
					setTimeout(function(){
						toggleLogin($('.login'), e.target, true);
					}, 500)
				}
			}else{
				toggleLogin(this, e.target, false);
			}
		}
	});

	$('.register').click(function(e){
		if(!animateRunning && $(e.target).hasClass('register')){
			animateRunning = true;
			if($(e.target).find('.inner-form').css('display') == 'none'){
				if(!loginFormOpened){
					toggleRegister(this, e.target, true);
				}else{
					toggleLogin($('.login'), e.target, false);					
					setTimeout(function(){
						toggleRegister($('.register'), e.target, true);
					}, 500)
				}
			}else{
				toggleRegister(this, e.target, false);
			}
		}
	});

	function toggleLogin(that, target, toggle){
		if(toggle){
			$(that).animate({
				marginBottom: '+=120'
			}, 500);
		    $('#slideLogin').slideDown({
		    	duration: 500,
		    	complete: function(){
		    		$(target).find('.input-field').css('display', 'flex');
		    		$(target).find('.submit-field').css('display', 'flex');
		    		animateRunning = false;
		    		loginFormOpened = true;
		    	}
		    });
		}else{
			$(target).find('.input-field').css('display', 'none');
    		$(target).find('.submit-field').css('display', 'none');
			$(that).animate({
				marginBottom: '-=120'
			}, 500);
		    $('#slideLogin').slideUp({
		    	duration: 500,
		    	complete: function(){
		    		animateRunning = false;
		    		loginFormOpened = false;
		    	}
		    });
		}
	}

	function toggleRegister(that, target, toggle){
		if(toggle){
			$(that).animate({
				marginBottom: '+=270'
			}, 500);
		    $('#slideRegister').slideDown({
		    	duration: 500,
		    	complete: function(){
		    		$(target).find('.input-field').css('display', 'flex');
		    		$(target).find('.submit-field').css('display', 'flex');
		    		animateRunning = false;
		    		registerFormOpened = true;
		    	}
		    });
		}else{
			$(target).find('.input-field').css('display', 'none');
    		$(target).find('.submit-field').css('display', 'none');
			$(that).animate({
				marginBottom: '-=270'
			}, 500);
		    $('#slideRegister').slideUp({
		    	duration: 500,
		    	complete: function(){
		    		animateRunning = false;
		    		registerFormOpened = false;
		    	}
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

				handleUser(targetArray);
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
		        		window.location="panel,page/index";
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
		        	if(response.return == 1)
		        		console.log("Pomyślnie zarejestrowano")
		        }
		    });
			}
		}
	}
</script>

{include file="footer.html.php"}