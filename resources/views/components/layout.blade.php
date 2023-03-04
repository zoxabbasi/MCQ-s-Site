<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MCQ's | Talal Abbasi</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('template/css/main.css') }}">
</head>

<body>
    <div id="app">
        <x-top-navbar />
        <x-side-navbar />
        <x-is-title />

        <main>
            {{ $slot }}
        </main>

    </div>
    {{-- @include('partials.admin.modal'); --}}
    <x-script />
    <x-flash-messages />
</body>

</html>
