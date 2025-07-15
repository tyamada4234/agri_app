@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                        <img src="{{ asset('storage/image/' . $headline->image_path) }}">
                                    @endif
                                </div>
                                <div class="title p-2">
                                    <h1>{{ Str::limit($headline->title, 70) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <p class="body mx-auto">{{ Str::limit($headline->body, 650) }}</p>
                        </div>
                        <div class="col-md-2">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="/">Events</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="/event_index">Topics</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($events as $event)
                    <div class="event">
                        <div class="row">
                            <div class="text col-md-8">
                                <div class="date">
                                    {{ $event->launch_date->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ Str::limit($event->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ Str::limit($event->body, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-4 text-right mt-4">
                                @if ($event->image_path)
                                    <img src="{{ asset('storage/image/' . $event->image_path) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection