{include file="Panel/header.html.php"}


<div class="content-wrapper">
	<div class="container">
		<div class="row">
			<section class="col-md-12 content">
				<div class="row">
					<div class="col-md-6 col-md-push-3">
						<div class="option">
							<span>Twój profil</span>
						</div>
						<div class="option-list">
							<table class="--table">
								<tr>
									<td>Twój login</td><td class="username">Ładowanie...</td>
								</tr>
								<tr>
									<td>Twój email</td><td class="email">Ładowanie...</td>
								</tr>
								<tr>
									<td>Twoje imię</td><td class="firstname">Ładowanie...</td>
								</tr>
								<tr>
									<td>Twoje nazwisko</td><td class="surname">Ładowanie...</td>
								</tr>
								<tr>
									<td>Zdobyte punkty</td><td class="points">Ładowanie...</td>
								</tr>
							</table>
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
	$(document).ready(function() {
		$.ajax({
		    url: '{$router->makeUrl("apiv1,panel,users/one")}',
		    type: "GET",
		    success: function success(response) {
		    	//console.log(response.response);
		    	if(response.return){
		    		var userData = response.response;
		    		console.log(userData)
		    		$('.username').html(userData.username);
		    		$('.email').html(userData.email);
		    		$('.firstname').html(userData.firstname);
		    		$('.surname').html(userData.surname);
		    		$('.points').html(userData.points);
		    		$('.user-full-name').html(userData.firstname + ' ' + userData.surname);
		    	}
		    }
		});
	});
</script>

{include file="Panel/footer.html.php"}