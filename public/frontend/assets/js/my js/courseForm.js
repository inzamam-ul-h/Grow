function validateForm() {
    var course_name = document.getElementById("course_name").value;
    var course_description = document.getElementById("course_description").value;

    // Get selected category
    var category = document.getElementById("category").value;
    var categoryError = document.getElementById("categoryError");

    // Get files
    const courseImage = document.getElementById("course_image").files[0];
    const courseIcon = document.getElementById("course_icon").files[0];

    // Get radio buttons
    const courseTypeRadios = document.getElementsByName("course_type");

    var course_nameError = document.getElementById("course_nameError");
    var course_descriptionError = document.getElementById("course_descriptionError");
    const imageError = document.getElementById("course_imageError");
    const iconError = document.getElementById("course_iconError");

    course_nameError.textContent = "";
    course_descriptionError.textContent = "";
    categoryError.textContent = "";
    imageError.textContent = "";
    iconError.textContent = "";

    var isValid = true;

    // Validate name (must not be empty)
    if (course_name.trim() === "") {
        course_nameError.textContent = "Name is required.";
        isValid = false;
    }

    // Validate description (must not be empty)
    if (course_description.trim() === "") {
        course_descriptionError.textContent = "Description is required.";
        isValid = false;
    }

    // Validate category (must be selected)
    if (category === "") {
        categoryError.textContent = "Category is required.";
        isValid = false;
    }

    // Allowed image types
    const allowedTypes = ["image/jpeg", "image/png", "image/gif"];

    // Validate course image
    if (!courseImage) {
        imageError.textContent = "Course Image is required.";
        isValid = false;
    } else if (!allowedTypes.includes(courseImage.type)) {
        imageError.textContent = "Invalid file type for Course Image. Only JPG, PNG, and GIF are allowed.";
        isValid = false;
    } else if (courseImage.size > 2 * 1024 * 1024) { // 2MB
        imageError.textContent = "Course Image must be less than 2MB.";
        isValid = false;
    }

    // Validate course icon
    if (!courseIcon) {
        iconError.textContent = "Course Icon is required.";
        isValid = false;
    } else if (!allowedTypes.includes(courseIcon.type)) {
        iconError.textContent = "Invalid file type for Course Icon. Only JPG, PNG, and GIF are allowed.";
        isValid = false;
    } else if (courseIcon.size > 2 * 1024 * 1024) { // 2MB
        iconError.textContent = "Course Icon must be less than 2MB.";
        isValid = false;
    }

    // Validate course type
    var courseTypeSelected = false;
    for (var i = 0; i < courseTypeRadios.length; i++) {
        if (courseTypeRadios[i].checked) {
            courseTypeSelected = true;
            break;
        }
    }
    if (!courseTypeSelected) {
        course_typeError.textContent = "Course type is required.";
        isValid = false;
    }

    return isValid;
}
