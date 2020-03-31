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
    <meta name="title" content="👋 Bryson Reece — Maker, Student, Human.">
    <meta name="description" content="DIY enthusiast and software engineer constantly looking for new projects and challenges.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#5c6ae6">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://bryson.cc/">
    <meta property="og:title" content="👋 Bryson Reece — Maker, Student, Human.">
    <meta property="og:description" content="DIY enthusiast and software engineer constantly looking for new projects and challenges.">
    <meta property="og:image" content="/img/social/meta.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://bryson.cc/">
    <meta property="twitter:title" content="👋 Bryson Reece — Maker, Student, Human.">
    <meta property="twitter:description" content="DIY enthusiast and software engineer constantly looking for new projects and challenges.">
    <meta property="twitter:image" content="/img/social/meta.png">

    <link rel="stylesheet" type="text/css" href="{{ $mix['/css/app.css'] }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:700|Open+Sans:400,600,700" rel="stylesheet">

    @stack('styles')
</head>