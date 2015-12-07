$(document).ready(function() {
	$('.submit').click(function(){
		$('#addPersonForm').submit();
	});

//alert(2);
    var ticketValidators = {
            validators: {
                notEmpty: {
                    message: '请选择门票'
                }
            }
	    },
		bookIndex = 0;
	
    $('#addPersonForm').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            'first_name[]': {
                validators: {
                    notEmpty: {
                        message: 'The first name is required and cannot be empty'
                    }
                }
            },
            'last_name[]': {
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    }
                }
            },
            'company[]': {
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    }
                }
            },
            'title[]': {
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    }
                }
            },
            'mobile[]': {
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    }
                }
            },
            'email[]': {
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            'tickets[0][]': {
                validators: {
                    notEmpty: {
                        message: '请选择门票'
                    }
                }
            }
        }
    })
        // Add button click handler
    .on('click', '.addperson', function() {
    		bookIndex++;
        var $template = $('.person_info_demo'),
        	$form22=$('form>a'),
            $clone    = $template
                        .clone()
                        .removeClass('hide')
                        .insertBefore($form22);
        
            $option1   = $clone.find('[name="first_name[]"]');
            $option2   = $clone.find('[name="last_name[]"]');
            $option3   = $clone.find('[name="company[]"]');
            $option4   = $clone.find('[name="title[]"]');
            $option5   = $clone.find('[name="mobile[]"]');
            $option6   = $clone.find('[name="email[]"]');
            $clone.find('[name="tickets"]').attr('name', 'tickets[' + bookIndex + '][]');
            
            
		// Add new field
		$('#addPersonForm').bootstrapValidator('addField', $option1)
					        .bootstrapValidator('addField', $option2)
					        .bootstrapValidator('addField', $option3)
					        .bootstrapValidator('addField', $option4)
					        .bootstrapValidator('addField', $option5)
					        .bootstrapValidator('addField', $option6)
							.bootstrapValidator('addField', 'tickets[' + bookIndex + '][]', ticketValidators);


    })
    
    
    .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');
            var request_url = $("input[name='form_request']").val();
            var update_opt = "{"+$("input[name='form_update']").val()+":'#result'}";
            //alert(update_opt);
            
			$form.request(request_url, {
			update: {'beysongEvents::list':'#result'}
							});;
        });

});