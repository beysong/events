$(document).ready(function() {
	$('.submit').click(function(){
		$('#addPersonForm').submit();
	});
$('.addperson').click(function(){
	personnode = $('#addPersonForm>fieldset.person_info:last-child').clone();
	current_num = personnode.children("legend").children(".num").text();
	num = 1+current_num*1;
    personnode.children("legend").children(".num").text(num);
    ticketname = "tickets["+num+"][]";
    personnode.children("form-group:last-child").find("input[type=checkbox]").attr("name",ticketname);

	personnode.appendTo($('#addPersonForm'));
    //alert(personnode.children(".num").text());
});
//alert(2);
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
    }).on('success.form.bv', function(e) {
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