@extends('layouts.default')

@section('content')
<div class="container max-w-4xl py-12.5">
    <a class="transparent-button font-normal" href="/">&#8249; Home</a>

    <div class="mt-3" id="professional">
        <h2 class="mb-12.5 text-4xl font-bold">{{ $jobsTitle }}</h2>

        @foreach ($jobs as $job)
            <div class="section expanded-card">
                <div class="data-item flex flex-row items-center">
                    @if ($job->logo)
                        <img src="{{ $job->logo }}" alt="{{ $job->name }}">
                    @endif

                    <div class="inline">
                        @if ($job->url)
                            <a href="{{ $job->url }}" target="_blank">
                                <h3 class="md:text-xl font-bold">
                                    {{ $job->title }} - {{ $job->name }}
                                </h3>
                            </a>
                        @else
                            <h3 class="md:text-xl font-bold">
                                {{ $job->title }} - {{ $job->name }}
                            </h3>
                        @endif

                        <h4 class="text-sm data-sub-heading">
                            {{ $job->dates->begin }} @if ($job->dates->end) - {{ $job->dates->end }}@endif, {{ $job->location }}
                        </h4>
                    </div>
                </div>
                <div class="description">
                    <p>{{ $job->description }}</p>
                    <p></p>
                </div>

                @foreach ($job->resources as $resource)
                    <a href="{{ $resource->url }}" target="_blank" class="block my-4 chevron">
                        View {{ $resource->name }} <span>&#8250;</span>
                    </a>
                @endforeach
            </div>
        @endforeach
    </div>
    <div class="mt-24" id="community">
        <h2 class="mb-12.5 text-4xl font-bold">{{ $communityTitle }}</h2>

        @foreach ($community as $experience)
            <div class="section expanded-card">
                <div class="data-item flex flex-row items-center">
                    @if ($experience->logo)
                        <img src="{{ $experience->logo }}" alt="{{ $experience->name }}">
                    @endif

                    <div class="inline">
                        @if ($experience->url)
                            <a href="{{ $experience->url }}" target="_blank">
                                <h3 class="md:text-xl font-bold">
                                    {{ $experience->name }}
                                </h3>
                            </a>
                        @else
                            <h3 class="md:text-xl font-bold">
                                {{ $experience->name }}
                            </h3>
                        @endif

                        <h4 class="text-sm data-sub-heading">
                            {{ $experience->dates->begin }} @if ($experience->dates->end) - {{ $experience->dates->end }}@endif, {{ $experience->title }}
                        </h4>
                    </div>
                </div>
                <div class="description">
                    <p>{!! $experience->description !!}</p>
                    <p></p>
                </div>

                @foreach ($experience->resources as $resource)
                    <a href="{{ $resource->url }}" target="_blank" class="block my-4 chevron">
                        View {{ $resource->name }} <span>&#8250;</span>
                    </a>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection