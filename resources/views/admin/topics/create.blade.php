<x-layout>
    <x-hero title="Topics" button="Back" href="{{ route('admin.topics') }}"/>
    <div class="card-content">
        <form method="POST" action="{{ route('admin.topic.create') }}">
            @csrf

            <div class="field">
                <label class="label">Subject</label>
                <div class="control">
                    <div class="select">
                        <select name="subject">
                            <option>Select relevant subject</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}"
                                    {{ old('subject') == $subject->id ? 'selected' : '' }}>{{ $subject->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label">Name</label>
                <div class="field-body">
                    <div class="field">
                        <div class="control icons-left">
                            <input class="input" type="text" placeholder="Name" name="name">
                            <span class="icon left"><i class="mdi mdi-mail"></i></span>
                            @error('name')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label">Description</label>
                <div class="control">
                    <textarea class="textarea" placeholder="Explain how we can help you" name="description"></textarea>
                </div>
            </div>
            <hr>
            <div class="field grouped">
                <div class="control">
                    <button type="submit" class="button green">
                        Submit
                    </button>
                </div>
                <div class="control">
                    <button type="reset" class="button red">
                        Reset
                    </button>
                </div>
            </div>
        </form>
    </div>
    </div>
    </section>
</x-layout>
