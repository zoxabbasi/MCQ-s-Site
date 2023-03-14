@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv)
@endphp

<ul class="flex">
    @foreach ($tags as $tag)
        <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">

            {{-- Adding a link, so that when we click on the tag, it opens a link of the respective tag to display the list --}}
            <a href="/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
    @endforeach
</ul>
