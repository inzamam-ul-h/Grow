$(document).ready(function() {
    // Function to validate form
    function validateForm() {
        let isValid = true;

        // Clear previous error messages
        $('.error').text('');

        // Validate Lecture Name
        if ($('#lecture_name').val().trim() === '') {
            $('#lecture_nameError').text('Lecture Name is required.');
            isValid = false;
        } else if ($('#lecture_name').val().length < 3) {
            $('#lecture_nameError').text('Lecture Name must be at least 3 characters long.');
            isValid = false;
        }

        // Validate Lecture Description
        if ($('#lecture_description').val().trim() === '') {
            $('#lecture_descriptionError').text('Lecture Description is required.');
            isValid = false;
        } else if ($('#lecture_description').val().length < 10) {
            $('#lecture_descriptionError').text('Lecture Description must be at least 10 characters long.');
            isValid = false;
        }

        // Validate Lecture File
        const fileInput = $('#lecture_file')[0];
        if (fileInput.files.length === 0) {
            $('#lecture_fileError').text('Lecture File is required.');
            isValid = false;
        } else {
            const fileExtension = fileInput.files[0].name.split('.').pop().toLowerCase();
            const validExtensions = ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'zip', 'rar'];
            if (!validExtensions.includes(fileExtension)) {
                $('#lecture_fileError').text('Invalid file type. Accepted types are: PDF, DOC, DOCX, PPT, PPTX, ZIP, RAR.');
                isValid = false;
            }
        }

        // Validate Lecture Video
        const videoInput = $('#lecture_video')[0];
        if (videoInput.files.length > 0) {
            const videoExtension = videoInput.files[0].name.split('.').pop().toLowerCase();
            const validVideoExtensions = ['mp4', 'avi', 'mov', 'mkv'];
            if (!validVideoExtensions.includes(videoExtension)) {
                $('#lecture_videoError').text('Invalid video type. Accepted types are: MP4, AVI, MOV, MKV.');
                isValid = false;
            }
        }

        return isValid;
    }

    // Attach form submit event
    $('#lecture_form').on('submit', function(event) {
        if (!validateForm()) {
            // Prevent form submission if validation fails
            event.preventDefault();
        }
    });
});
