@extends('layouts.default')

@section('content')
<div class="container max-w-4xl py-12.5">
    <a class="transparent-button font-normal" href="/">&#8249; Home</a>

    <div class="mt-3">
        <h2 class="mb-12.5 text-4xl font-bold">{{ $title }}</h2>

        @foreach ($projects as $project)
            <div class="section expanded-card">
                <div class="data-item">
                    <div class="inline">
                        @if (isset($project->url))
                            <a href="{{ $project->url }}" target="_blank">
                                <h3 class="md:text-xl font-bold">
                                    {{ $project->title }}
                                </h3>
                            </a>
                        @else
                            <h3 class="md:text-xl font-bold">
                                {{ $project->title }}
                            </h3>
                        @endif

                        <h4 class="text-sm data-sub-heading">
                            {{ $project->dates->begin }} @if (isset($project->dates->end)) - {{ $project->dates->end }} @endif
                        </h4>
                    </div>
                </div>
                <div class="description">
                    <p>{!! $project->description !!}</p>
                    <p></p>
                </div>

                @if (isset($project->resources))
                    @foreach ($project->resources as $resource)
                        @if (isset($resource->html))
                            {!! $resource->html !!}
                        @else
                            <a href="{{ $resource->url }}" target="_blank" class="block my-4 chevron">
                                View {{ $resource->name }} <span>&#8250;</span>
                            </a>
                        @endif
                    @endforeach
                @endif
            </div>
        @endforeach
    </div>
@endsection
