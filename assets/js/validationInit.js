function formValidation() {

    "use strict";

    /*----------- BEGIN validationEngine CODE -------------------------*/

    $('#popup-validation').validationEngine();

    /*----------- END validationEngine CODE -------------------------*/



    /*----------- BEGIN validate CODE -------------------------*/

    





    $('#block-validate').validate({

        rules: {

            required2: "required",

            email2: {

                required: true,

                email: true

            },

            date2: {

                required: true,

                date: true

            },

            url2: {

                required: true,

                url: true

            },

            password2: {

                required: true,

                minlength: 5

            },

            confirm_password2: {

                required: true,

                minlength: 5,

                equalTo: "#password2"

            },

            agree2: "required",

            digits: {

                required: true,

                digits: true

            },

            range: {

                required: true,

                range: [5, 16]

            }

        },

        errorClass: 'help-block',

        errorElement: 'span',

        highlight: function (element, errorClass, validClass) {

            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');

        },

        unhighlight: function (element, errorClass, validClass) {

            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');

        }

    });

	

	

	

	$('#brand1-validate').validate({

        rules: {

            name: "required",

            order: {

                required: true,

                digits: true

            }

        },

        errorClass: 'help-block',

        errorElement: 'span',

        highlight: function (element, errorClass, validClass) {

            $(element).parents('.form-group').addClass('has-error');

        },

        unhighlight: function (element, errorClass, validClass) {

            $(element).parents('.form-group').removeClass('has-error');

        }

    });

    

    $('#spec-validate').validate({

        rules: {

            name: "required"

        },

        errorClass: 'help-block',

        errorElement: 'span',

        highlight: function (element, errorClass, validClass) {

            $(element).parents('.form-group').addClass('has-error');

        },

        unhighlight: function (element, errorClass, validClass) {

            $(element).parents('.form-group').removeClass('has-error');

        }

    });

    

    $('#brand-validate').validate({

        rules: {
			
            'np[]':{required:true}

        },

        errorClass: 'help-block',

        errorElement: 'span',

        highlight: function (element, errorClass, validClass) {

            $(element).parents('.form-group').addClass('has-error');

        },

        unhighlight: function (element, errorClass, validClass) {

            $(element).parents('.form-group').removeClass('has-error');

        }

    });

    

    $('#category-validate').validate({

        rules: {

            name: "required"

        },

        errorClass: 'help-block',

        errorElement: 'span',

        highlight: function (element, errorClass, validClass) {

            $(element).parents('.form-group').addClass('has-error');

        },

        unhighlight: function (element, errorClass, validClass) {

            $(element).parents('.form-group').removeClass('has-error');

        }

    });

    

    $('#subcat-validate').validate({

        rules: {

            name: {

                required: true

            },

            category: {

                required: true

            },

            per: {

                required: true

            },

            order: {

                required: true,

                digits: true

            }

        },

        errorClass: 'help-block',

        errorElement: 'span',

        highlight: function (element, errorClass, validClass) {

            $(element).parents('.form-group').addClass('has-error');

        },

        unhighlight: function (element, errorClass, validClass) {

            $(element).parents('.form-group').removeClass('has-error');

        }

    });

    

    $('#acc-validate').validate({

        rules: {

            name: {

                required: true

            },

            category: {

                required: true

            },

            subcategory: {

                required: true

            },

            order: {

                required: true,

                digits: true

            }

        },

        errorClass: 'help-block',

        errorElement: 'span',

        highlight: function (element, errorClass, validClass) {

            $(element).parents('.form-group').addClass('has-error');

        },

        unhighlight: function (element, errorClass, validClass) {

            $(element).parents('.form-group').removeClass('has-error');

        }

    });

	

	

	$('#profile-validate').validate({

        rules: {

        	name: {

                required: true

            },

            email: {

                required: true,

                email: true

            },

            contact: {

                required: true,

                min: 8

            }

        },

        message: {

        	name: {

                required: "Enter Your Name"

                

            },

            email: {

                required: "Enter Your Email ID",

                email: "Enter Proper Email ID"

            },

            contact: {

                required: "Enter Your Contact No.",

                min: "Enter Minimum 8 digits"

            }

        },

        errorClass: 'help-block',

        errorElement: 'span',

        highlight: function (element, errorClass, validClass) {

            $(element).parents('.form-group').addClass('has-error');

        },

        unhighlight: function (element, errorClass, validClass) {

            $(element).parents('.form-group').removeClass('has-error');

        }

    });	

	

    $('#prod_dtl').validate({

        rules: {

            cat: {

                required: true

            },

            subcat: {

                required: true

            },

            prod_name: {

                required: true

            },

            brand: {

                required: true

            },

            sku: {

                required: true

            },

            warranty: {

                required: true,

            },

        },

        errorClass: 'help-block',

        errorElement: 'span',

        highlight: function (element, errorClass, validClass) {

            $(element).parents('.form-group').addClass('has-error');

        },

        unhighlight: function (element, errorClass, validClass) {

            $(element).parents('.form-group').removeClass('has-error');

        }

        });

    /*----------- END validate CODE -------------------------*/

}