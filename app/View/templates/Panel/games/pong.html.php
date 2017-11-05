{include file="Panel/header.html.php"}

<link rel="stylesheet" href='{$router->publicWeb("libs/css/pong/pong.css")}'>
 <script src='{$router->publicWeb("libs/js/pong/pong.js")}'></script>

<div class="content-wrapper">
	<div class="container">
		<div class="row">
			<section class="col-md-12 content">
				<div class="row">
					<div class="col-md-12">
						<div class="game-area">
							<div class="game-title">
								<span>Pong</span>
							</div>
							<div class="game-screen">
								<div id="score">
									<span id="cpuScore">CPU Score: <span id="cpuPoints">0</span></span>
									<span id="playerScore"></span>
								</div>
								<div class="menu">
									<div class="menu-list">
										<button class="start-game">Start</button>
										<span>Poziom trudności</span>
										<button class='easy'>Łatwy</button>
										<button class='inter'>Średni</button>
										<button class='hard'>Zaawansowany</button>
									</div>									
								</div>
								<div id="game">
									
								</div>
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
		    		$('#playerScore').html(userData.username + ': <span id="playerPoints">' + userData.points + '</span>');
		    		$('.user-full-name').html(userData.firstname + ' ' + userData.surname);
		    	}
		    }
		});
	});
</script>

{include file="Panel/footer.html.php"}