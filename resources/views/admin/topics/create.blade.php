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

    <section class="section main-section">
        <div class="card mb-6">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-ballot"></i></span>
                    Add Topic Form
                </p>
            </header>
            <div class="card-content">
                <form method="POST" action="{{ route('admin.topic.create') }}">
                    @csrf
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


    {{-- To include footer --}}
    @include('partials.footer')
    {{-- To include script --}}
    @include('partials.script')
</body>

</html>
