@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">

            
                @foreach($events as $event)
                    <div class="event">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $event->launch_date->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ Str::limit($event->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ Str::limit($event->body, 1500) }}
                                </div>
                                <div>
                                    <a href="{{ route('event.event_details', ['id' => $event->id]) }}">詳細</a>
                                </div>
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