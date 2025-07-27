@extends('layouts.front')

@section('content')
<div class="container">
    <hr color="#c0c0c0">
    <div class="row">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="event-tab" data-bs-toggle="tab" data-bs-target="#event-tab-pane" type="button" role="tab" aria-controls="event-tab-pane" aria-selected="true">Event</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="topic-tab" data-bs-toggle="tab" data-bs-target="#topic-tab-pane" type="button" role="tab" aria-controls="topic-tab-pane" aria-selected="false">Topic</button>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="event-tab-pane" role="tabpanel" aria-labelledby="event-tab" tabindex="0">
                <p>これはイベントの内容です。</p>
                @foreach($events as $event)

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

                <hr color="#c0c0c0">
                @endforeach
            </div>
            <div class="tab-pane fade" id="topic-tab-pane" role="tabpanel" aria-labelledby="topic-tab" tabindex="0">
                <p>これはトピックタブの内容です。修正</p>
                @foreach($topics as $topic)
                
                    <div class="text col-md-8">
                        <div class="date">
                            {{ $topic->created_at->format('Y年m月d日') }}
                        </div>
                        <div class="title">
                            {{ Str::limit($topic->title, 150) }}
                        </div>
                        <div class="body mt-3">
                            {{ Str::limit($topic->body, 1500) }}
                        </div>
                    </div>
                    <div class="image col-md-4 text-right mt-4">
                        @if ($topic->image_path)
                        <img src="{{ asset('storage/image/' . $topic->image_path) }}">
                        @endif
                    </div>
                
                <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection