
    function validateForm() {
    // Get the form elements
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var password_confirmation = document.getElementById("password_confirmation").value;
       var post = document.getElementById("post").value;
    var experience = document.getElementById("experience").value;
    var qualification = document.getElementById("qualification").value;
    // var address = document.getElementById("address").value;
    // var organization = document.getElementById("organization") ? document.getElementById("organization").value : null;

    // Get the error display elements
    var nameError = document.getElementById("nameError");
    var emailError = document.getElementById("emailError");
    var passwordError = document.getElementById("passwordError");
     var password_confirmationError = document.getElementById("password_confirmationError");
     var postError = document.getElementById("postError");
    var experienceError = document.getElementById("experienceError");
    var qualificationError = document.getElementById("qualificationError");
    // // var addressError = document.getElementById("addressError");
    // var organizationError = document.getElementById("organizationError");

    // Clear any previous errors
    nameError.textContent = "";
    emailError.textContent = "";
    passwordError.textContent = "";
    password_confirmationError.textContent = "";
     postError.textContent = "";
    experienceError.textContent = "";
    qualificationError.textContent = "";
    // addressError.textContent = "";
    // organizationError.textContent = "";

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

    // Validate post (must not be empty)
    if (post === "") {
        postError.textContent = "Post is required.";
        isValid = false;
    }

    // Validate experience (must not be empty)
    if (experience === "") {
        experienceError.textContent = "Experience is required.";
        isValid = false;
    }

    // Validate qualification (must not be empty)
    if (qualification === "") {
        qualificationError.textContent = "Please Enter Qualification.";
        isValid = false;
    }

    // // Validate address (must not be empty)
    // if (address === "") {
    //     addressError.textContent = "Address is required.";
    //     isValid = false;
    // }

    // // Validate organization (must not be empty if the field exists)
    // if (organization !== null && organization === "") {
    //     organizationError.textContent = "Must select organization Name";
    //     isValid = false;
    // }

    // If the form is valid, return true. Otherwise, return false to prevent submission.
    return isValid;
}
