@extends('layouts.user')
@section('title', 'イベントの編集')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>イベント編集</h2>
                <form action="{{ route('user.event.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $event_form->title }}" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2" for="genre">ジャンル</label>
                        <div class="col-md-10" >
                            <select name="genre_ids[]" class="form-control" multiple>
                                
                                @foreach($genres as $genre)
                                <option value="{{ $genre->id }}" {{ $event_form->genres->contains('id', $genre->id) ? 'selected' : '' }}>{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">日時</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="launch_date" value="{{ $event_form->launch_date }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ $event_form->body }}</textarea> 
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                            設定中：{{ $event_form->image_path}} 
                            </div>

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $event_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection