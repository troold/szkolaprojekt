{include file="panel/header.html.php"}


<div class="content-wrapper">
	<div class="container">
		<div class="row">
			<section class="col-md-12 content">
				<div class="row">
					<div class="col-md-6 col-md-push-3">
						<div class="option btn edit">
							<span class="option-title">Edytuj swój profil</span>							
						</div>
						<div class="col-xs-12 option-list edit-form">
							<div class="input-field">
								<div class="input-text"><span>Imię</span></div>
								<div class="input-data"><input id="nameField" type="text" name="firstname" class="register-credentials" placeholder="Twoje imię"></div>
							</div>
							<div class="input-field">
								<div class="input-text"><span>Nazwisko</span></div>
								<div class="input-data"><input id="surnameField" type="text" name="surname" class="register-credentials" placeholder="Twoje nazwisko"></div>
							</div>
							<div class="input-field">
								<div class="input-text"><span>Hasło</span></div>
								<div class="input-data"><input id="passwdField" type="password" name="password" class="register-credentials" placeholder="Hasło">
								<input id="repeatPasswdField" type="password" name="repeatPassword" class="register-credentials" placeholder="Potwórz hasło"></div>
							</div>
							<div class="input-field">
								<div class="input-text"><span>Miasto</span></div>
								<div class="input-data"><input id="townField" type="text" name="town" class="register-credentials" placeholder="Miasto zamieszkania"></div>
							</div>
							<div class="submit-field">
								<button class="submit-button" data-type="register">Edytuj</button>
							</div>
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
	$('.submit-field').click(function(){
		var targetArray = {};

		$.each($('.edit-form').find('input'), function(key, data){
			if($(data).val().length>0)
				targetArray[$(data).attr('name')] = $(data).val();
		});

		if(targetArray['password']){
			if(targetArray['password'] != targetArray['repeatPassword']){
				console.log('Hasła nie zgadzają się');
			}else{
				editProfile(targetArray);
			}
		}else{
			editProfile(targetArray);
		}
	});

	function editProfile(editArray){
		$.ajax({
	        url: '{$router->makeUrl("apiv1,users/editProfile")}',
	        type: "POST",
	        data: editArray,
	        success: function success(response) {
	        	console.log(response);
	        	if(response.return == 1){
	        		console.log("Pomyślnie zedytowano profil");
	        	}
	        }
	    });
	}
</script>

{include file="panel/footer.html.php"}