$(document).ready(function() {
	$('.submit').click(function(){
		$('#addPersonForm').submit();
	});

//alert(2);
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
            'tickets[][]': {
                validators: {
                    notEmpty: {
                        message: 'Please specify at least one language you can speak'
                    }
                }
            }
        }
    })
        // Add button click handler
    .on('click', '.addperson', function() {
            var $template = $('.person_info_demo'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .insertBefore($template),
                $option1   = $clone.find('[name="first_name[]"]');
                $option2   = $clone.find('[name="last_name[]"]');
                $option3   = $clone.find('[name="company[]"]');
                $option4   = $clone.find('[name="title[]"]');
                $option5   = $clone.find('[name="mobile[]"]');
                $option6   = $clone.find('[name="email[]"]');

            // Add new field
            $('#addPersonForm').bootstrapValidator('addField', $option1);
            $('#addPersonForm').bootstrapValidator('addField', $option2);
            $('#addPersonForm').bootstrapValidator('addField', $option3);
            $('#addPersonForm').bootstrapValidator('addField', $option4);
            $('#addPersonForm').bootstrapValidator('addField', $option5);
            $('#addPersonForm').bootstrapValidator('addField', $option6);
        
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