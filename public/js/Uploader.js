
	//e.preventDefault();

	//console.log("Submitted");
	var options = {
		beforeSend: function(){
			$("#loading").fadeIn('slow');
			
			console.log("beforeSend");
		}, uploadProgress: function(event, position, total, percentComplete){
			//$("#broadcastBar").width(percentComplete+'%');
			//$("#broadcastPercent").html(percentComplete+'%');
			console.log("uploadProgress");
		}, success: function(response){
				// Success message
				$('#success').html("<div class='alert alert-success'>");
				$('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
				.append( "</button>");
				$('#success > .alert-success').append("<strong>Upload Success.</strong>");
				$('#success > .alert-success').append('</div>');
				//clear all fields
				$('form')[0].reset();
		}, complete: function(response){
			$("#loading").fadeOut('slow');
			console.log("Complete. response: "+response.responseText);
		}, error: function(){
			// Fail message
			$('#success').html("<div class='alert alert-danger'>");
			$('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
			.append( "</button>");
			$('#success > .alert-danger').append("<strong>Sorry, it seems that server is not responding...</strong> Could you please notify me directly to <a href='kabelokwasi@gmail.com?Subject=Message_Me;>kabelokwasi@gmail.com</a> ? Sorry for the inconvenience!");
			$('#success > .alert-danger').append('</div>');
			//clear all fields
			$('form')[0].reset();
			
			console.log("ERROR: ");
		}
	};
	
	/*
	try{
		
	}catch(error){
		console.log("Error with ajaxForm(): "+error);
	}
	
	console.log("Done"+id);
	*/