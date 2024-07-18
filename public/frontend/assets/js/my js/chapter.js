


$(document).ready(function() {
    $('#chapterForm').submit(function(e) {
        // Reset any previous error messages
        $('.error').text('');

        // Validate Chapter Name
        var chapterName = $('#chapter_name').val().trim();
        if (chapterName.length < 3) {
            $('#chapter_nameError').text('Chapter Name must be at least 3 characters long.');
            e.preventDefault();
        }

        // Validate Chapter Description
        var chapterDescription = $('#chapter_description').val().trim();
        if (chapterDescription.length < 10) {
            $('#chapter_descriptionError').text('Chapter Description must be at least 10 characters long.');
            e.preventDefault();
        }

        // Validate Chapter Icon (Image)
        var chapterIcon = $('#chapter_icon').val();
        if (chapterIcon) {
            var ext = chapterIcon.split('.').pop().toLowerCase();
            if ($.inArray(ext, ['jpg', 'jpeg', 'png', 'gif']) == -1) {
                $('#chapter_iconError').text('Only JPG, JPEG, PNG or GIF files are allowed.');
                e.preventDefault();
            }
        } else {
            $('#chapter_iconError').text('Chapter Icon is required.');
            e.preventDefault();
        }

        // Validate Chapter Image
        var chapterImage = $('#chapter_image').val();
        if (chapterImage) {
            var ext = chapterImage.split('.').pop().toLowerCase();
            if ($.inArray(ext, ['jpg', 'jpeg', 'png', 'gif']) == -1) {
                $('#chapter_imageError').text('Only JPG, JPEG, PNG or GIF files are allowed.');
                e.preventDefault();
            }
        } else {
            $('#chapter_imageError').text('Chapter Image is required.');
            e.preventDefault();
        }
    });
});
