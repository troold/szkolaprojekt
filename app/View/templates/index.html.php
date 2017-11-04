{include file="header.html.php"}


<div class="content-wrapper">
	<div class="container">
		<div class="row">
			<section class="col-md-12 content">
				<div class="row">
					<div class="col-md-6 col-md-push-3">
						panel/index
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

	$('.login').click(function(e){
		if(!animateRunning && $(e.target).hasClass('login')){
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

	$('.submit-button').click(function(){
		console.log('submit')
		console.log($('#loginField').val())
		console.log($('#passwdField').val())
		if($('#loginField').val().length > 0 && $('#passwdField').val().length > 0){
			let username = $('#loginField').val();
			let pass = $('#passwdField').val();
			login(username,pass);
			console.log('finished')
		}
	});

	function login(login, passwd){
		$.ajax({
	        url: '{$router->makeUrl("apiv1,users/login")}',
	        type: "POST",
	        data: {
	        	login: login,
	        	password: passwd
	        },
	        success: function success(response) {
	        	console.log(response);
	        	if(response.return == 1)
	        		window.location="panel,page/index";
	        }
	    });
	}
</script>

{include file="footer.html.php"}