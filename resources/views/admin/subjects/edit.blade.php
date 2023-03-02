<x-layout>
    <x-hero title="Subjects" button="Back" href="{{ route('admin.subjects') }}"/>
    <section class="section main-section">
        <div class="card mb-6">
            <div class="card-content">
                <form method="POST" action="{{ route('admin.subject.edit', $subject) }}">
                    @csrf
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <input class="input" type="text" placeholder="Enter subjects name"
                                        name="name" value="{{ old('name') ? old('name') : $subject->name }}">
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
                            <textarea class="textarea" placeholder="Explain how we can help you" name="description">{{ old('description') ? old('description') : $subject->description }}</textarea>
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
