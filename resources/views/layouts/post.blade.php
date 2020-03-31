@extends('layouts.default')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.19.0/themes/prism-okaidia.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.19.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.19.0/plugins/autoloader/prism-autoloader.min.js"></script>
@endpush

@section('content')
<div class="container max-w-4xl py-12.5">
    <a class="transparent-button font-normal" href="/posts">&#8249; All Posts</a>

    <div class="mt-3">
        <h2 class="mb-12.5 text-4xl font-bold">{{ $title }}</h2>

        <div class="post-body">
            {!! $body !!}
        </div>
    </div>
@endsection