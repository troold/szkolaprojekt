{include file="header.html.php"}


<div class="content-wrapper">
	<div class="container">
		<div class="row">
			<section class="col-md-12 content">
				<div class="row">
					<div class="col-md-6 col-md-push-3">
						<div class="option btn login">
							<span>Zaloguj</span>
							<div class="inner-form" id="slide" style="display: none;">
								<div class="input-field" style="display: none">
									<span>Login</span><input type="text" name="login" class="login-credentials">
								</div>
								<div class="input-field" style="display: none">
									<span>Hasło</span><input type="text" name="password" class="login-credentials">
								</div>
								<div class="submit-field" style="display: none">
									<button>Zaloguj</button>
								</div>
							</div>
						</div>
						<div class="option btn register">
							<span>Zarejestruj</span>
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
	$.ajax({
        url: '{$router->makeUrl("apiv1,users/login")}',
        type: "POST",
        data: {
        	login: 'testlogin',
        	haslo: 'testhaslo'
        },
        success: function success(response) {
        	console.log(response);
        }
    });
	$('.login').click(function(){
		if(!animateRunning){
			animateRunning = true;
			if($('.inner-form').css('display') == 'none'){
				$(this).animate({
					marginBottom: '+=120'
				}, 500);
			    $('#slide').slideDown({
			    	duration: 500,
			    	complete: function(){
			    		$('.input-field').css('display', 'flex');
			    		$('.submit-field').css('display', 'flex');
			    		animateRunning = false;
			    	}
			    });
			}else{
				$('.input-field').css('display', 'none');
	    		$('.submit-field').css('display', 'none');
				$(this).animate({
					marginBottom: '-=120'
				}, 500);
			    $('#slide').slideUp({
			    	duration: 500,
			    	complete: function(){
			    		animateRunning = false;
			    	}
			    });
			}
		}
	});
</script>

{include file="footer.html.php"}