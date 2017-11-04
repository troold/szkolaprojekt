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
	$.ajax({
        url: '{$router->makeUrl("apiv1,panel,users/one")}',
        type: "GET",
        data:{
        	userId: '1'
        },
        success: function success(response) {
        	console.log(response);
        }
    });
</script>

{include file="footer.html.php"}