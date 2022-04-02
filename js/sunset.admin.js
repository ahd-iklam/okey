jQuery(document).ready( function($){
	
	var mediaUploader;
	
	$('#upload-button').on('click',function(e) {
		e.preventDefault();
		if( mediaUploader ){
			mediaUploader.open();
			return;
		}
		
		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Profile Picture',
			button: {
				text: 'Choose Picture'
			},
			multiple: false
        });
    });
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	  })
	  // Contact  FORM SUBMISSION
	  $('#contactForm').on('submit' , function(element){
		element.preventDefault();
		var form =$(this);
		var name = form.find('#name').val(),
		    email = form.find('#email').val(),
			message = form.find('#message').val(),
			ajxurl = form.data('url');
console.log(message)
		$.ajax({
			url : ajxurl,
			type : 'post',
			data : {
				name : name,
				email : email,
				message : message,
				action: 'save_user_contact_form'
			},
			error : function(response){
				console.log('something wrong')
			},
			success : function(response){
				
				if(response == 0){console.log("unable to save your message")}
				else{console.log('message saved thank you')}

			}
		});
	});
});
