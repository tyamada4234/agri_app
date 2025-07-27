@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">    
            <div class="row">
                <div class="text col-md-6">
                    <div class="title">
                        {{ 'トピック名：' . Str::limit($topic->title, 150) }}
                     </div>
                    <div class="date">
                        {{ '作成日時：' . $topic->created_at->format('Y年m月d日') }}
                     </div>
                    
                    <div>
                        ジャンル：
                        @foreach($topic->genres as $genre)
                        {{ $genre->name }}
                        @endforeach
                    </div>
                    
                    <div class="body mt-3">
                        {{ 'トピック内容：' . Str::limit($topic->body, 1500) }}
                    </div>
                </div>
                <div class="image col-md-6" mx-auto>
                     @if ($topic->image_path)
                        <img src="{{ asset('storage/image/' . $topic->image_path) }}">
                     @endif
                </div>
            </div>
    </div>
@endsection             