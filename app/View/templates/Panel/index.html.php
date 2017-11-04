{include file="Panel/header.html.php"}

<div class="content-wrapper">
	<div class="container">
		<div class="row">
			<section class="col-md-12 content">
				<div class="row">
					<div class="col-md-6 col-md-push-3">
						<div class="option">
							<span>Lista gier</span>
						</div>
						<div class="option-list">
							<ul>
								<ul><a href="#">Pong</a></ul>
								<ul>Clicker</ul>
								<ul>Matcher</ul>
							</ul>
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
	    		$('.user-full-name').html(userData.firstname + ' ' + userData.surname);
	    	}
	    }
	});
});
</script>

{include file="Panel/footer.html.php"}