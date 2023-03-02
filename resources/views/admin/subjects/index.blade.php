<x-layout>

    <section class="is-hero-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <h1 class="title">
                Subjects
            </h1>
            <a href="{{ route('admin.subject.create') }}" class="button light">Add Subject</a>
        </div>
    </section>
    <div class="card has-table">
        <div class="card-content">
            @if (count($subjects))
                <table>
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Number of topics</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                            <tr>
                                <td data-label="Sr. No">{{ $loop->iteration }}</td>
                                <td data-label="Name">{{ $subject->name }}</td>
                                <td data-label="Description">{{ $subject->description }}</td>
                                <td data-label="Number">{{ count($subject->topics) }}</td>
                                <td data-label="Slug">{{ $subject->slug }}</td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <a href="{{ route('admin.subject.edit', $subject) }}" class="button small green">
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
            @endif
        </div>
    </div>

</x-layout>
