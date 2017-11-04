$(document).ready(function() {
	$.ajax({
	    url: '{$router->makeUrl("apiv1,panel,users/one")}',
	    type: "GET",
	    success: function success(response) {
	    	console.log(response);
	    }
	});
});