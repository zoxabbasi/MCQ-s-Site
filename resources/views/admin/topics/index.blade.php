<!DOCTYPE html>
<html lang="en" class="">
{{-- To include header --}}
@include('partials.header')

<body>
    {{-- To include navbar --}}
    @include('partials.topnavbar')
    {{-- To include sidebar --}}
    @include('partials.sidenavbar')
    {{-- To include title --}}
    @include('partials.istitle')
    {{-- To include hero --}}
    @include('partials.ishero')

    <div class="card has-table">
        <div class="card-content">
            @if (count($topics))
                <table>
                    <thead>
                        <tr>
                            <th>Sr. No</th>
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
                                <td data-label="Name">{{ $topic->name }}</td>
                                <td data-label="Name">{{ $topic->description }}</td>
                                <td data-label="Slug">{{ $topic->slug }}</td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <a href="{{ route('admin.topic.edit', $topic) }}"
                                            class="button small green">
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

    {{-- To include footer --}}
    @include('partials.footer')
    {{-- To include script --}}
    @include('partials.script')
</body>

</html>
