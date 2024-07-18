


$(document).ready(function() {
    $('#topicForm').submit(function(e) {
        // Reset any previous error messages
        $('.error').text('');

        // Validate topic Name
        var topicName = $('#topic_name').val().trim();
        if (topicName.length < 3) {
            $('#topic_nameError').text('Topic Name must be at least 3 characters long.');
            e.preventDefault();
        }

        // Validate topic Description
        var topicDescription = $('#topic_description').val().trim();
        if (topicDescription.length < 10) {
            $('#topic_descriptionError').text('Topic Description must be at least 10 characters long.');
            e.preventDefault();
        }

        // Validate topic Icon (Image)
        var topicIcon = $('#topic_icon').val();
        if (topicIcon) {
            var ext = topicIcon.split('.').pop().toLowerCase();
            if ($.inArray(ext, ['jpg', 'jpeg', 'png', 'gif']) == -1) {
                $('#topic_iconError').text('Only JPG, JPEG, PNG or GIF files are allowed.');
                e.preventDefault();
            }
        } else {
            $('#topic_iconError').text('Topic Icon is required.');
            e.preventDefault();
        }

        // Validate topic Image
        var topicImage = $('#topic_image').val();
        if (topicImage) {
            var ext = topicImage.split('.').pop().toLowerCase();
            if ($.inArray(ext, ['jpg', 'jpeg', 'png', 'gif']) == -1) {
                $('#topic_imageError').text('Only JPG, JPEG, PNG or GIF files are allowed.');
                e.preventDefault();
            }
        } else {
            $('#topic_imageError').text('Topic Image is required.');
            e.preventDefault();
        }
    });
});
