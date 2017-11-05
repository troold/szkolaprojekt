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
	    		$('.email').html(userData.email);
	    		$('.firstname').html(userData.firstname);
	    		$('.surname').html(userData.surname);
	    		$('.points').html(userData.points);
	    		$('.town').html(userData.town);
	    		$('.user-full-name').html(userData.firstname + ' ' + userData.surname);
	    		if($('#playerScore').length>0)
	    			$('#playerScore').html(userData.username + ': <span id="playerPoints">0</span>');
	    	}
	    }
	});
});