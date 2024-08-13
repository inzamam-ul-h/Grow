@include('frontend.layouts.header_links')
@include('frontend.layouts.header')




<div class="wrapper">
    <div class="container-fluid">
        <!-- Buttons for adding chapter and viewing trash -->
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('topic.show', ['id' => $topic->id, 'chid' => $topic->chapter_id]) }}">
                    <button class="btn btn-success">View Topics</button>
                </a>
            </div>
            <div class="col-md-6 text-right">
                <a href="#">
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> View Trash</button>
                </a>
            </div>
        </div>
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Grow</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('topic.show', ['id' => $topic->id, 'chid' => $topic->chapter_id]) }}">Topics</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Assignment</h4>
                </div>
            </div>
        </div>
        <!-- end page title and breadcrumb -->

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
<head><meta name="csrf-token" content="{{ csrf_token() }}">
</head>
        <!-- Quiz Creation Form -->
        <div class="container">
            <form id="quiz_creation_form">
                <!-- Quiz Title -->
                <div class="form-group">
                    <label for="quiz_title">Quiz Title</label>
                    <input type="text" class="form-control" id="quiz_title" name="quiz_title" placeholder="Enter Quiz Title">
                </div>

                <!-- Questions Container -->
                <div id="questions_container">
                    <div class="question-block mb-4">


                    </div>
                </div>

                <!-- Add Question Button -->
                <button type="button" id="add_question" class="btn btn-primary mt-3">Add Question</button>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success mt-3">Create Quiz</button>
            </form>

            <div id="response_message" class="mt-3"></div>
        </div>
        <!-- End Quiz Creation Form -->
    </div>
</div>







@include('frontend.layouts.footer_links')

@include('frontend.layouts.footer')



<script>
  $(document).ready(function() {
    // Include CSRF token in every AJAX request
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var questionIndex = 1; // Start with the first question index

    // Function to add a new question
    function addQuestion() {
        var questionHtml = `
            <div class="question-block mb-4" id="question_${questionIndex}">
                <!-- Question Text -->
                <div class="form-group">
                    <label for="question_text_${questionIndex}">Question ${questionIndex}</label>
                    <input type="text" class="form-control" id="question_text_${questionIndex}" name="questions[${questionIndex}][question_text]" placeholder="Enter Question Text">
                </div>

                <!-- Options -->
                <div class="form-group">
                    <label>Options</label>
                    <div class="options_wrapper" id="options_wrapper_${questionIndex}">
                        <div class="option_block">
                            <input type="text" class="form-control mb-2" name="questions[${questionIndex}][options][]" placeholder="Option 1">
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary add_option" data-question-id="${questionIndex}">Add Option</button>
                </div>

                <!-- Correct Option -->
                <div class="form-group">
                    <label for="correct_option_${questionIndex}">Correct Option</label>
                    <select class="form-control correct_option_select" id="correct_option_${questionIndex}" name="questions[${questionIndex}][correct_option]">
                        <option value="">Select the correct option</option>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
            </div>
        `;

        $('#questions_container').append(questionHtml);
        populateCorrectOptionSelect(questionIndex);
        questionIndex++;
    }

    // Function to populate correct option dropdown for a specific question
    function populateCorrectOptionSelect(questionId) {
        var selectElement = $('#correct_option_' + questionId);
        var optionsCount = $('#options_wrapper_' + questionId + ' .option_block').length;

        selectElement.empty();
        selectElement.append('<option value="">Select the correct option</option>');

        for (var i = 1; i <= optionsCount; i++) {
            selectElement.append('<option value="' + i + '">Option ' + i + '</option>');
        }
    }

    // Add question button click event
    $('#add_question').click(function() {
        addQuestion();
    });

    // Add option button click event (delegated)
    $(document).on('click', '.add_option', function() {
        var questionId = $(this).data('question-id');
        var optionsWrapper = $('#options_wrapper_' + questionId);

        var optionCount = optionsWrapper.find('.option_block').length + 1;
        var newOptionHtml = `
            <div class="option_block">
                <input type="text" class="form-control mb-2" name="questions[${questionId}][options][]" placeholder="Option ${optionCount}">
            </div>
        `;

        optionsWrapper.append(newOptionHtml);
        populateCorrectOptionSelect(questionId);
    });

    // Submit form via AJAX
    $('#quiz_creation_form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('quiz.store', ['topic_id' => $topic->id]) }}",
            method: "POST",
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    $('#response_message').html('<div class="alert alert-success">' + response.success + '</div>');
                    $('#quiz_creation_form')[0].reset();
                    $('#questions_container').empty(); // Clear the questions container
                } else if (response.error) {
                    $('#response_message').html('<div class="alert alert-danger">' + response.error + '</div>');
                }
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                var errorHtml = '<div class="alert alert-danger"><ul>';
                $.each(errors, function(key, error) {
                    errorHtml += '<li>' + error[0] + '</li>';
                });
                errorHtml += '</ul></div>';
                $('#response_message').html(errorHtml);
            }
        });
    });

    // Initialize with the first question
    addQuestion();
});

    </script>


