(function( $ ) {
	$.ajaxSetup({
      	headers: {
          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      	}
    });
	$(document).on('change','.assign-role-to-user',function(){
		var value=$(this).val();
		var id=$(this).data('id');
		var old_role = $('#old_role_'+id).val();
		console.log(value,"fdgdfg");
		$.ajax({
			type:'POST',
			data:{
				value:value,
				id:id,
				old_role:old_role
			},
			url:'/admin/save_user_role',
			success:function(resp){
				$('.success-box').show();
				setTimeout(function(){
					$('.success-box').hide();
				},3000);
				console.log(resp,"response");
			},
			error:function(error){
				console.log("ERROR");	
			}
		})
	})
})( jQuery );