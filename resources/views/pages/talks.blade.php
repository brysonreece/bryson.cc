@extends('layouts.default')

@section('content')
<div class="container max-w-4xl py-12.5">
    <a class="transparent-button font-normal" href="/">&#8249; Home</a>
    <h2 class="mt-3 mb-12.5 text-4xl font-bold">{{ $title }}</h2>
    @foreach ($talks as $talk)
        <div class="section expanded-card">
            <div class="data-item">
                <div class="inline">
                    @if (isset($talk->url))
                        <a href="{{ $talk->url }}" target="_blank">
                            <h3 class="md:text-xl font-bold">
                                {{ $talk->title }}
                            </h3>
                        </a>
                    @else
                        <h3 class="md:text-xl font-bold">
                            {{ $talk->title }}
                        </h3>
                    @endif

                    <h4 class="text-sm data-sub-heading">
                        {!! $talk->occured_at !!}, {{ $talk->location }} @if($talk->facility)<br>{{ $talk->facility }}@endif
                    </h4>
                </div>
            </div>
            <div class="description">
                <p>{!! $talk->description !!}</p>
                <p></p>
            </div>

            @if (isset($talk->resources))
                @foreach ($talk->resources as $resource)
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
