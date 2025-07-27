@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">

            
                @foreach($topics as $topic)
                    <div class="topic">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $topic->created_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ Str::limit($topic->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ Str::limit($topic->body, 1500) }}
                                </div>
                                <div>
                                    <a href="{{ route('topic.topic_details', ['id' => $topic->id]) }}">詳細</a>
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