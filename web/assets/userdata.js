$(document).ready(function() {
	console.log('test')
	$.ajax({
	    url: '{$router->publicWeb("apiv1,panel,users/one")}',
	    type: "GET",
	    success: function success(response) {
	    	console.log(response);
	    	if(response.return){
	    		var userData = response.response;
	    		console.log(userData)
	    		$('.username').html(userData.username);
	    		$('.user-full-name').html(userData.firstname + ' ' + userData.surname);
	    	}
	    }
	});
});