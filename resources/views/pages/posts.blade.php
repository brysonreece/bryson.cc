@extends('layouts.default')

@section('content')
<div class="container max-w-4xl py-12.5">
    <a class="transparent-button font-normal" href="/">&#8249; Home</a>
    <h2 class="mt-3 mb-12.5 text-4xl font-bold">{{ $title }}</h2>

    @foreach ($posts as $index => $post)
        <a href="{{ $post->url }}" class="block md:text-xl chevron{{ $index ? ' mt-8' : '' }}">
            {{ $post->title }} <span>&#8250;</span>
        </a>
    @endforeach
</div>
@endsection
