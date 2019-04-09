$(function(){
	$(document).on('click', '.ajax-modal-box', function(){
		url = $(this).attr('data-url');
        title = $(this).attr('data-title');
        if (title === "Add Voter" || title === "Edit Voter") {
            $('.modal .modal-dialog').addClass('modal-lg');
        }
        $('.ajax-form-model').modal();
        $('.modal .modal-title').html(title);
        $('.ajax-form-model .panel-body').load(url);
        $('.ajax-load-image').addClass('d-none');
	});


	$(document).on('submit', '.ajax-form-post', function(e){
		e.preventDefault();

		var url = $(this).attr('action');
		var form = $(this);
		var formData = false;
		if (window.FormData) {
			formData = new FormData(form[0]);
		}

        $( '.error-message' ).each(function( ) {
                $(this).html('');
        });
		
		$.ajax({
			url : url,
			data : formData ? formData : form.serialize(),
			cache : false,
			contentType : false,
            processData : false,
            type        : 'POST',
            success : function(response){
            	console.log(response);
                // SUCCESS
            	if (response.status === "success") {
            		$('.loadTable').load(location.href + ' .loadTable .tableData');
                	$('.ajax-form-model').modal('toggle');

                    // set message
                  $('.ajax-message-div').html(response.message);
                  $('.response-flash').show().delay(3000).hide(0);
            	}
                // UNABLE
                if (response.status =='unable') {
                  $('.ajax-form-model').modal('toggle');

                  // set message
                  $('.ajax-message-div').html(response.message);
                  $('.response-flash-unable').show().delay(3000).hide(0);
                
                }
            	if (response.status === "fail") {
            		for (var key in response.errors) {
                        //console.log(response);
                        var error_message = response.errors[key];

                        var error_form_field = form.find("[name=" + key + "]");
                        error_form_field.addClass('errors');
                        error_form_field.parent().find('.error-message').addClass('text-danger').html(error_message);
                    }
            	}
            }
		});
	});

   $(document).on('change', '.ajax-input', function(){
        var url = $(this).attr('data-url');
        var type = $(this).attr('data-type');
        var id = $(this).children("option:selected").val();
       
        $.get(url,{data : id, type : type},function(response){
            // console.log(response);
            if (type == "municipality") {
                $('.filterMunicipality').html(response);
            }
            if (type == "ward") {
                 $('.filterWard').html(response);
            }

            if (type == "poll") {
                 $('.filterLocation').html(response);
            }
        });
   });
});