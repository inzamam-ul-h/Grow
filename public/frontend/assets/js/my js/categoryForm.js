function validateForm() {
    var category_name = document.getElementById("category_name").value;
    var category_description=document.getElementById("category_description").value;

     // Get files
     const categoryImage = document.getElementById('category_image').files[0];
     const categoryIcon = document.getElementById('category_icon').files[0];



    //error
    var category_nameError = document.getElementById("category_nameError");
    var category_descriptionError = document.getElementById("category_descriptionError");
    const imageError = document.getElementById('category_image_error');
    const iconError = document.getElementById('category_icon_error');

     // Clear any previous errors
     category_nameError.textContent = "";
     category_descriptionError.textContent = "";

    // Reset error messages
    imageError.textContent = '';
    iconError.textContent = '';

        // Initialize a variable to track validation status
    var isValid = true;


    // Validate name (must not be empty)
    if (category_name === "") {
        category_nameError.textContent = "Name is required.";

       isValid = false;
   }

   if (category_description=== "") {
    category_descriptionError.textContent = "Description  is required.";
    isValid = false;
    }








    // Allowed image types
    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];



    // Validate category image
    if (!categoryImage) {
        imageError.textContent = 'Category Image is required.';
        isValid = false;
    } else if (!allowedTypes.includes(categoryImage.type)) {
        imageError.textContent = 'Invalid file type for Category Image. Only JPG, PNG, and GIF are allowed.';
        isValid = false;
    }

    // Validate category icon
    if (!categoryIcon) {
        iconError.textContent = 'Category Icon is required.';
        isValid = false;
    } else if (!allowedTypes.includes(categoryIcon.type)) {
        iconError.textContent = 'Invalid file type for Category Icon. Only JPG, PNG, and GIF are allowed.';
        isValid = false;
    }



    const maxSize = 2 * 1024 * 1024; // 2MB

// Validate category image size
if (categoryImage && categoryImage.size > maxSize) {
    imageError.textContent = 'Category Image must be less than 2MB.';
    isValid = false;
}

// Validate category icon size
if (categoryIcon && categoryIcon.size > maxSize) {
    iconError.textContent = 'Category Icon must be less than 2MB.';
    isValid = false;
}

   // If the form is valid, return true. Otherwise, return false to prevent submission.
   return isValid;
}
