<x-admin.layout>
    <x-admin.hero title="Topics" button="Add Topic" href="{{ route('admin.topic.create') }}" />

    <div class="card has-table">
        <div class="field">
            <label class="label">Subject</label>
            <div class="control">
                <div class="select">
                    <select name="subject" id="subject">
                        <option>Select relevant subject</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div id="all_topics"></div>

        {{-- To get all the topics of the specific subject in the dropdown --}}
        <script>
            const subjectElement = document.querySelector('#subject');
            const allTopicElement = document.querySelector('#all_topics');

            subjectElement.addEventListener('change', function() {
                const subjectElementValue = subjectElement.value;
                const token = document.querySelector('input[name="_token"]').value;

                const data = {
                    subjectId: subjectElementValue,
                    _token: token,
                }

                //A sudo route to asyncronious functionality
                fetch('{{ route('admin.topics.fetch.all') }}', {
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
                        allTopicElement.innerHTML = result;
                    })
            })
        </script>
    </div>
</x-admin.layout>
