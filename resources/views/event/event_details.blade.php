@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">    
            <div class="row">
                <div class="text col-md-6">
                    <div class="title">
                        {{ 'イベント名：' . Str::limit($event->title, 150) }}
                     </div>
                    <div class="date">
                        {{ '開催日時：' . $event->launch_date->format('Y年m月d日') }}
                     </div>
                    
                    <div>
                        ジャンル２：
                        @foreach($event->genres as $genre2)
                        {{ $genre2->name }}
                        @endforeach
                    </div>
                    
                    <div class="body mt-3">
                        {{ 'イベント内容：' . Str::limit($event->body, 1500) }}
                    </div>
                </div>
                <div class="image col-md-6" mx-auto>
                     @if ($event->image_path)
                        <img src="{{ asset('storage/image/' . $event->image_path) }}">
                     @endif
                </div>
            </div>
    </div>
@endsection             