function validateForm() {
    var name = document.getElementById("name").value;
    var email=document.getElementById("email").value;
    var password=document.getElementById("password").value;
    var password_confirmation=document.getElementById("password_confirmation").value;
    var register_no=document.getElementById("register_no").value;
    var contact=document.getElementById("contact").value;

    //error
    var nameError = document.getElementById("nameError");
    var emailError = document.getElementById("emailError");
    var passwordError = document.getElementById("passwordError");
    var password_confirmationError = document.getElementById("password_confirmationError");
    var register_noError=document.getElementById("register_noError");
   var contactError=document.getElementById("contactError");

    // Clear any previous errors
    nameError.textContent = "";
    emailError.textContent = "";
    passwordError.textContent="";
    password_confirmationError.textContent="";
    register_noError.textContent = "";
    contactError.textContent = "";


    // Initialize a variable to track validation status
    var isValid = true;


     // Validate name (must not be empty)
     if (name === "") {
        nameError.textContent = "Name is required.";
        isValid = false;
    }



     // Validate email (must be a valid email format)
     var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
     if (email === "") {
         emailError.textContent = "Email is required.";
         isValid = false;
     } else if (!email.match(emailPattern)) {
         emailError.textContent = "Please enter a valid email address.";
         isValid = false;
     }


      //Validate password (must be at least 8 characters long)
    if (password === "") {
        passwordError.textContent = "Password is required.";
        isValid = false;
    } else if (password.length < 8) {
        passwordError.textContent = "Password must be at least 8 characters long.";
        isValid = false;
    }

    // Validate password confirmation (must match password)
    if (password_confirmation !== password) {
        password_confirmationError.textContent = "Passwords do not match.";
        isValid = false;
    }


      // Validate register_no (must not be empty)
      var registerNoPattern = /^[a-zA-Z0-9]{5,10}$/;
    if (register_no === "") {
        register_noError.textContent = "Registration No is required.";
        isValid = false;
    } else if (!register_no.match(registerNoPattern)) {
        register_noError.textContent = "Registration No must be 5-10 alphanumeric characters.";
        isValid = false;
    }

    // Validate contact (must be numeric and not more than 11 digits)
    var contactPattern = /^[0-9]{11}$/;
    if (contact === "") {
        contactError.textContent = "Contact is required.";
        isValid = false;
    } else if (!contact.match(contactPattern)) {
        contactError.textContent = "Contact must be a number and 11 digits.";
        isValid = false;
    }




      // If the form is valid, return true. Otherwise, return false to prevent submission.
    return isValid;
    }

