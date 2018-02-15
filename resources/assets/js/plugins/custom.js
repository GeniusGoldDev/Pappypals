 $(document).ready(function(){
 	//Admin can create max 4 users
 	if($('.user-identiti').length >= 6) {
 		$('.add-more-child').hide();
 	} else if ($('.user-identiti').length <= 5) {
 		$('.add-more-child').show();
 	}
 	
 	//Button that goes back 1 step on module after module has been complete.
 	$('#previewModule').on('click', function () {
 		$('.lbutton').show();
 		$('.rbuttons').show();
 		$('#module').show();
 		$('#congrats').hide();
 	});

 });