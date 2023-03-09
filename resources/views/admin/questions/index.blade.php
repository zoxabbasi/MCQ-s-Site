<x-admin.layout>
    <x-admin.hero title="Questions" button="Add Question" href="{{ route('admin.question.create') }}" />
    <div class="card has-table">

        <div class="card-content">
            {{-- Select input element for subject --}}
            <div
                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 my-10">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <label
                        class="label mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Subject</label>
                    <div class="control">
                        <div class="select">
                            <select name="subject" id="subject">
                                <option>Select a subject</option>
                                @if (count($subjects))
                                    @foreach ($subjects as $subject)
                                        @php
                                            if ($subject->id == old('subject')) {
                                                $subject_model = $subject;
                                            }
                                        @endphp

                                        <option value="{{ $subject->id }}"
                                            {{ old('subject') == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    </h6>
                </div>
            </div>

            {{-- Select input element for topic --}}
            <div
                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 my-10">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <label
                        class="label mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Topic</label>
                    <div class="control">
                        <div class="select">
                            <select name="topic" id="topic">
                                <option>Select a topic</option>
                                @if (old('subject') || old('topic'))
                                    @if (count($subject_model->topics) > 0)
                                        <option value="" selected disabled hidden>Please select the topic!
                                        </option>
                                        @foreach ($topics as $topic)
                                            @if ($topic->subject_id == old('subject'))
                                                <option value="{{ $topic->id }}"
                                                    {{ old('topic') == $topic->id ? 'selected' : '' }}>
                                                    {{ $topic->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endif
                                @endif

                            </select>

                        </div>
                    </div>
                    </h6>
                </div>
            </div>
        </div>


        <div class="card-content">
            {{-- Input elements for dynamic controller --}}
            <div id="questions"></div>
        </div>

        <div class="card-content" id="all-questions">
            {{-- To display all the questions from the database --}}
            @if (count($questions))
                @foreach ($questions as $question)
                    <div
                        class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 my-5">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Subject: <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    {{ $question->topic->subject->name }}</p>
                            </h6>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Topic: <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    {{ $question->topic->name }}</p>
                            </h5>
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Question: {{ $question->text }}</h5>
                            <ol>
                                @foreach ($question->choices as $choice)
                                    <li class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                        {{ $choice->text }}
                                        {{ $choice->is_correct == 1 ? '(Correct)' : '' }}
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No questions found</p>
            @endif
        </div>
    </div>

    <script>
        const subjectElement = document.querySelector('#subject');
        const topicElement = document.querySelector('#topic');

        subjectElement.addEventListener('change', function() {
            const subjectElementValue = subjectElement.value;
            const token = document.querySelector('input[name="_token"]').value;

            const data = {
                subjectId: subjectElementValue,
                _token: token,
            }

            fetch('{{ route('admin.subject.topics.questions') }}', {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(function(response) {
                    return response.json();
                })
                .then(function(result) {
                    topicElement.innerHTML = result;
                })
        })
    </script>

    <script>
        const allquestionElement = document.querySelector('#all-questions')
        const topicsElement = document.querySelector('#topic');
        const questionElement = document.querySelector('#questions');

        topicsElement.addEventListener('change', function() {
            const topicElementValue = topicsElement.value;
            const token = document.querySelector('input[name="_token"]').value;

            const data = {
                topicId: topicElementValue,
                _token: token,
            }
            fetch('{{ route('admin.subject.topics.questions.all') }}', {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(function(response) {
                    return response.json();
                })
                .then(function(result) {
                    questionElement.innerHTML = result;
                    allquestionElement.style.display = 'none';
                })
        })
    </script>
</x-admin.layout>
