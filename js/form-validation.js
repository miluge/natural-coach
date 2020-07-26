// Validator startDate vs endDate

jQuery.validator.addMethod("greaterThan", 
function(value, element, params) {

    if (!/Invalid|NaN/.test(new Date(value))) {
        return new Date(value) < new Date($(params).val());
    }

    return isNaN(value) && isNaN($(params).val()) 
        || (Number(value) < Number($(params).val())); 
},'Must be greater than {0}.');

$(document).ready(function() {
    $.validator.addMethod("endDate", function(value, element) {
        var startDate = $('.startDate').val();
        return Date.parse(startDate) <= Date.parse(value) || value == "";
    }, "* End date must be after start date");
    $('#formId').validate();
});


// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='add-hiker']").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        first_name: {
            required: true,
        },
        last_name: {
            required: true,
        },
        email: {
          required: true,
          // Specify that email should be validated
          // by the built-in "email" rule
          email: true
        },
        phone: {
          required: true,
          minlength: 10
        }
      },
      // Specify validation error messages
      messages: {
        firstname: "Please enter your firstname",
        lastname: "Please enter your lastname",
        phone: {
          required: "Please provide a phone number",
          minlength: "Phone numbers must be composed of 10 numbers"
        },
        email: "Please enter a valid email address"
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });
  });

// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='add-trip']").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        name: {
            required: true,
        },
        start_date: {
            required: true,
            dateISO: true
        },
        end_date: {
            required: true,
            dateISO: true
        },
        price: {
          required: true,
        },
        region_start: {
            required: true,
            
        },
        region_end: {
            required: true,
            
        },
        max_participant: {
            required: true,
            
        },
      // Specify validation error messages
      messages: {
        name: "Please enter a name for the trip",
        start_date: "Please provide a start date",
        end_date: "Please provide a start date",
        price: "please provide a price for the trip",
        email: "Please enter a valid email address",
        region_start: "Please provide a starting region",
        region_end: "Please provide an en region for the trip",
        max_participant: "Please add a maximum apacity for the trip"
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    }
    });
  });
  
// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='add-guide']").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        first_name: {
            required: true,
            minlength: 1
        },
        last_name: {
            required: true,
            minlength: 1
        },
        phone: {
          required: true,
          minlength: 10
        }
      },
      // Specify validation error messages
      messages: {
        firstname: "Please enter your firstname",
        lastname: "Please enter your lastname",
        phone: {
          required: "Please provide a phone number",
          minlength: "Phone numbers must be composed of 10 numbers"
        },
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });
  });

  // Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='add-group']").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        first_name: {
            required: true,
        },
        last_name: {
            required: true,
        },
        email: {
          required: true,
          // Specify that email should be validated
          // by the built-in "email" rule
          email: true
        },
        phone: {
          required: true,
          minlength: 10
        }
      },
      // Specify validation error messages
      messages: {
        firstname: "Please enter your firstname",
        lastname: "Please enter your lastname",
        phone: {
          required: "Please provide a phone number",
          minlength: "Phone numbers must be composed of 10 numbers"
        },
        email: "Please enter a valid email address"
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });
  });