$(function(){

	$('#username').on('keyup', function() {
		var usernameVal = $(this).val();
		var $input = $(this);
		//console.log(this);

		if(usernameVal) {
			$.ajax({
				url: 'db.php',
				method: 'get',
				data: {username: usernameVal},
				success: function(response) {

					Rresponse = $.parseJSON(response);

					if(Rresponse.status == 'success') {
					
						$input.css('border','solid 2px red');
						$('#status').text('Sorry! username already taken');
					}else {
						$input.css('border', 'solid 2px blue');
						$('#status').text('');
					}
				}
			});
		}
		
	});
});