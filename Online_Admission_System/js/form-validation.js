// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='registration']").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        name:{
            required: true,
            // lettersonly: true
        },
        fname:{
            required: true,
            // lettersonly: true
        },
        mname:{
            required: true,
            // lettersonly: true
        },
        email: {
          required: true,
          // Specify that email should be validated
          // by the built-in "email" rule
          email: true
        },
        username: {
          required: true,
          // Specify that email should be validated
          // by the built-in "email" rule
          email: true
        },
        pin: {
          required: true,
          minlength: 4,
          maxlength: 4
        },
        mobile: {
          required: true,
          minlength: 10,
          maxlength: 10
        }
      },
      // Specify validation error messages
      messages: {
        name: "Please enter your Name",
        fname: "Please enter your Father's Name",
        mname: "Please enter your Mother's Name",
        dob: "Please enter your Date of Birth",
        mobile:{
            required :"Please enter your Mobile Number",
            minlength : "Mobile number shouldn't be less than 10 digit",
            maxlength : "Mobile number shouldn't greater than 10 digit",

        },
        pin: {
          required: "Please provide a Pin",
          minlength: "Your password must be 4 digit",
          maxlength: "Your password must be 4 digit"
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