$(document).ready(function() {
    function validateField(field, rules) {
        const value = $(field).val().trim();
        let isValid = true;
        let errorMessage = '';

        // Remove previous error/success classes
        $(field).removeClass('is-invalid is-valid');
        $(field).next('.error').remove();

        // Check required rule
        if (rules.required && !value) {
            isValid = false;
            errorMessage = 'This field is required.';
        } else if (value) {
            // Check minlength rule
            if (rules.minlength && value.length < rules.minlength) {
                isValid = false;
                errorMessage = `Must be at least ${rules.minlength} characters long.`;
            }

            // Check file extension rule
            if (rules.extension) {
                const file = $(field)[0].files[0];
                if (file) {
                    const extension = file.name.split('.').pop().toLowerCase();
                    const validExtensions = rules.extension.split('|');
                    if (!validExtensions.includes(extension)) {
                        isValid = false;
                        errorMessage = `Invalid file type. Accepted types are: ${rules.extension.replace(/\|/g, ', ')}.`;
                    }
                }
            }
        }

        if (isValid) {
            $(field).addClass('is-valid');
        } else {
            $(field).addClass('is-invalid');
            $(field).after(`<span class="error">${errorMessage}</span>`);
        }

        return isValid;
    }

    // Attach event listeners for validation
    $('#assignment_title').on('input', function() {
        validateField('#assignment_title', { required: true, minlength: 3 });
    });

    $('#assignment_description').on('input', function() {
        validateField('#assignment_description', { required: true, minlength: 10 });
    });

    $('#assignment_file').on('change', function() {
        validateField('#assignment_file', { required: true, extension: 'pdf|doc|docx|ppt|pptx|zip|rar' });
    });

    // Form submit handler
    $('#assingment_form').on('submit', function(event) {
        const isTitleValid = validateField('#assignment_title', { required: true, minlength: 3 });
        const isDescriptionValid = validateField('#assignment_description', { required: true, minlength: 10 });
        const isFileValid = validateField('#assignment_file', { required: true, extension: 'pdf|doc|docx|ppt|pptx|zip|rar' });

        if (!isTitleValid || !isDescriptionValid || !isFileValid) {
            event.preventDefault(); // Prevent form submission if any field is invalid
        }
    });
});
