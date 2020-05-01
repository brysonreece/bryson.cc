@extends('layouts.default')

@section('content')
<div class="hero">
    <div class="container max-w-4xl pb-6 md:py-12.5">
        <h1 class="text-3xl md:text-5xl font-bold my-3.75">Hey! <span class="wave">👋</span> <br class="md:hidden">I'm Bryson Reece</h1>

        <h2 class="my-3.75 text-lg md:text-2xl">Lead Engineer at WellCaddie and DIY Enthusiast</h2>

        <div class="block my-16">
            <div class="inline-flex flex-col sm:flex-row items-center justify-center w-full">
                <a class="primary-cta py-3 px-8 sm:py-4 sm:px-16 font-bold whitespace-no-wrap w-5/6 sm:w-auto sm:mr-6" href="/files/resume.pdf" title="Resume" download="bryson-reece-resume">
                    View Resume
                </a>

                <a class="chevron secondary-cta py-3 px-8 sm:py-4 sm:px-16 font-bold whitespace-no-wrap w-5/6 sm:w-auto mt-8 sm:mt-auto sm:ml-6" href="/about" title="About Me">
                    About Me <span>&#8250;</span>
                </a>
            </div>
        </div>
        <p class="inline-block leading-loose text-sm font-bold p-4 rounded-lg text-gray-600">
            I'm currently looking for a new adventure!
            <a href="mailto:hey@bryson.cc?subject=Let's build something great together!" class="block mt-4">Think I'd be a good fit on your team?</a>
        </p>

        <hr>

        @include('partials.social')
    </div>
</div>

@include('partials.footer')
@endsection