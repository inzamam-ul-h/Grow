@php
    use App\Helpers\ChapterHelper;

    // Assuming $course is passed to the view
    $chapters = ChapterHelper::getChaptersWithTopicsAndLecturesByCourseId($course->id);
@endphp



<div class="col-md-3">
    @if ($chapters->isEmpty())
        <div class="card">
            <div class="card-header text-center bg-primary text-white">
                <h5 class="card-title">Chapters</h5>
            </div>
            <div class="card-body">
                <p>No chapters found for this course.</p>
            </div>
        </div>
</div>
@else

<div class="card">
    <div class="card-header text-center bg-primary text-white">
        <h5 class="card-title">Chapters</h5>
    </div>
    <div class="card-body">
        <ul class="list-group">
            @foreach ($chapters as $chapter)
                @if (isset($chapter->chapter_name) && $chapter->chapter_name != null)
                    <li class="list-group-item">
                        <a href="#" class="chapter-link" style="text-decoration: none; color: #333;">
                            <i class="fas fa-caret-right toggle-icon"></i>
                            <a href="{{ route('chapter.show', ['id' => $chapter->id, 'cid' => $course->id]) }}"> <strong
                                    style="color: #000; font-weight: bold;">
                                    {{ $loop->iteration }}: {{ strtoupper($chapter->chapter_name) }}
                                </strong>
                            </a>
                        </a>
                        <ul class="list-group mt-2 topics-list" style="display: none;">
                            @foreach ($chapter->topics as $topic)
                                <li class="list-group-item">
                                    <a href="#" class="topic-link" style="text-decoration: none; color: #333;">
                                        <i class="fas fa-angle-right"></i>
                                        <a
                                            href="{{ route('topic.show', ['id' => $topic->id, 'chid' => $chapter->id]) }}">
                                            <strong style="color: #000; font-weight: bold;">{{ $loop->iteration }}:
                                                {{ $topic->topic_name }}</strong>
                                        </a>
                                    </a>
                                    <ul class="list-group mt-2 lectures-list" style="display: none;">
                                        @foreach ($topic->lectures as $lecture)
                                            <li class="list-group-item">
                                                <a href="#" style="text-decoration: none; color: #333;">
                                                    <i class="far fa-file-video"></i>
                                                    <a
                                                        href="{{ route('lecture.show', ['id' => $lecture->id, 'tid' => $topic->id]) }}">
                                                        {{ $lecture->lecture_name }}
                                                    </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
</div>
@endif
@include('frontend.layouts.footer_links')
<script>
    $(document).ready(function() {
        $('.chapter-link').click(function(e) {
            e.preventDefault();
            var topicsList = $(this).siblings('.topics-list');
            topicsList.slideToggle();
            $('.topics-list').not(topicsList).slideUp();
        });

        $(document).on('click', '.topic-link', function(e) {
            e.preventDefault();
            var lecturesList = $(this).siblings('.lectures-list');
            lecturesList.slideToggle();
            $('.lectures-list').not(lecturesList).slideUp();
        });
    });
</script>





@include('frontend.layouts.footer_links')
