@extends('layouts.default')

@section('content')
<div class="container max-w-4xl py-12.5">
    <a class="transparent-button font-normal" href="/">&#8249; Home</a>

    <div id="about" class="mt-3">
        <h2 class="mb-12.5 text-4xl font-bold">{{ $title }}</h2>

        {!! $body !!}
    </div>
@endsection