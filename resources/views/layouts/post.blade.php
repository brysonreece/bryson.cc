<!DOCTYPE html>

<html lang="en-US">
    <head>
        <!-- Primary Meta Tags -->
        <meta charset="utf-8">
        <title>
            @if (isset($title))
                {{ $title }}
            @else
                Maker, Student, Human.
            @endif

            &mdash; Bryson Reece 👋
        </title>
        <meta name="title" content="👋 Bryson Reece — {{ $title ?? 'Maker, Student, Human.' }}'">
        <meta name="description" content="{{ $summary ?? 'DIY enthusiast and software engineer constantly looking for new projects and challenges.' }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#5c6ae6">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://bryson.cc/">
        <meta property="og:title" content="👋 Bryson Reece — {{ $title ?? 'Maker, Student, Human.' }}">
        <meta property="og:description" content="{{ $summary ?? 'DIY enthusiast and software engineer constantly looking for new projects and challenges.' }}">
        <meta property="og:image" content="https://bryson.cc/img/social/meta.png">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://bryson.cc/">
        <meta property="twitter:title" content="👋 Bryson Reece — {{ $title ?? 'Maker, Student, Human.' }}">
        <meta property="twitter:description" content="{{ $summary ?? 'DIY enthusiast and software engineer constantly looking for new projects and challenges.' }}">
        <meta property="twitter:image" content="https://bryson.cc/img/social/meta.png">

        <link rel="stylesheet" type="text/css" href="{{ $mix['/css/app.css'] }}">
        <link href="https://fonts.googleapis.com/css?family=Nunito:700|Open+Sans:400,600,700" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.19.0/themes/prism-okaidia.min.css" rel="stylesheet" />

        @stack('styles')
    </head>

    <body>
        @include('partials.nav')
        <div class="container max-w-4xl py-12.5">
            <a class="transparent-button font-normal" href="/posts">&#8249; All Posts</a>

            <div class="mt-3">
                <h2 class="mb-12.5 text-4xl font-bold">{{ $title }}</h2>

                <div class="post-body">
                    {!! $body !!}
                </div>
            </div>
        </div>
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.19.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.19.0/plugins/autoloader/prism-autoloader.min.js"></script>

    @include('partials.scripts')
</html>