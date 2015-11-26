$(document).ready(function() {
$('.addperson').click(function(){
	personnode = $('#addPersonForm>fieldset.person_info:last-child').clone();
	num = personnode.children("legend").children(".num").text();
    personnode.children("legend").children(".num").text(1+num*1);

	personnode.appendTo($('#addPersonForm'));
    //alert(personnode.children(".num").text());
});
    $('#addPerson').bootstrapValidator({
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
    });

});