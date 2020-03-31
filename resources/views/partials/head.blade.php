<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#5c6ae6">

    <title>
        @if (isset($title))
            {{ $title }} &mdash;
        @endif

        Bryson Reece
    </title>

    <link rel="stylesheet" type="text/css" href="{{ $mix['/css/app.css'] }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:700|Open+Sans:400,600,700" rel="stylesheet">

    @stack('styles')
</head>