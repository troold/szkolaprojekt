{include file="panel/header.html.php"}

<link rel="stylesheet" href='{$router->publicWeb("libs/css/matcher/matcher.css")}'>
<script type="text/javascript">{include file='panel/games/matcher/matcher.js'}</script>


<div class="content-wrapper">
	<div class="container">
		<div class="row">
			<section class="col-md-12 content">
				<div class="row">
					<div class="col-md-12">
						<div class="game-area">
							<div class="game-title">
								<span class="option-title">Matcher</span>
							</div>
							<div class="game-screen">
								<div id="score">
									<span id="playerScore">Ładowanie...</span>
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
								<div class="game-over" style="display: none">
									<div class="over-list">
										<span class="over-text"></span>
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

</script>

{include file="panel/footer.html.php"}