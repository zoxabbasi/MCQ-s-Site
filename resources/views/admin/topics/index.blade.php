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
        {{-- @if (count($topics))
                <table>
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Subject</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topics as $topic)
                            <tr>
                                <td data-label="Sr. No">{{ $loop->iteration }}</td>
                                <td data-label="Subject">{{ $topic->subject->name }}</td>
                                <td data-label="Name">{{ $topic->name }}</td>
                                <td data-label="Description">{{ $topic->description }}</td>
                                <td data-label="Slug">{{ $topic->slug }}</td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <a href="{{ route('admin.topic.edit', $topic) }}" class="button small green">
                                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                                        </a>
                                        <button class="button small red --jb-modal" data-target="sample-modal"
                                            type="button">
                                            <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No records found</p>
            @endif --}}

        <script>

            const subjectElement = document.querySelector('#subject');
            const allTopicElement = document.querySelector('#all_topics');

            subjectElement.addEventListener('change', function(){
                const subjectElementValue = subjectElement.value;
                const token = document.querySelector('input[name="_token"]').value;

                const data = {
                    subjectId : subjectElementValue,
                    _token : token,
                }

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
                    // console.log(result);
                })
            })
        </script>
    </div>
</x-admin.layout>
