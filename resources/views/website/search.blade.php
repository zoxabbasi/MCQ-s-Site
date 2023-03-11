<x-webpage.layout>

    <div class="container">
        <div class="row my-5">

            {{-- To display all the questions of the topic --}}
            <div class="col-md-12">
                @if (count($search) > 0)
                    @foreach ($search as $i)
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h5>{{ $loop->iteration . '. ' . $i->text }}</h5>
                                    </div>
                                    <div class="col-2">
                                        <h5>Topic:</h5><p>{{ $i->topic->name}}</p>
                                    </div>
                                    <div class="col-2">
                                        <h5>Subject:</h5><p>{{ $i->topic->subject->name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <ul>
                                            @foreach ($i->choices as $choice)
                                                {{-- @if ($i->is_correct == 1)
                                                    @php
                                                        $correct = $choice->text;
                                                        $number = $loop->iteration;
                                                    @endphp
                                                @else
                                                @endif --}}
                                                <li>{{ $choice->text }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="row">
                                    {{-- <div class="col-12">
                                        <p class="border rounded p-2 d-none" id="{{ $i->id }}">
                                            {{ $number . '. ' . $correct }}</p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card border shadow text-bg-danger">
                        <div class="card-body">
                            No Questions Found
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Script to display the correct answer --}}
    <script>
        function toggle(id) {
            let correctElement = document.getElementById(id);
            correctElement.classList.toggle('d-none');
        }
    </script>

</x-webpage.layout>
