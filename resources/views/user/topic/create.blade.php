{{-- layout/user/blade.phpを読み込む --}}
@extends('layouts.user')

@section('title', 'トピックの新規登録')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>新規トピック作成</h2>
                <form action="{{ route('user.topic.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors)) > 0
                        <ul>
                            @foreach($errors->all as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ジャンル</label>
                        <div class="col-md-10" >
                            <select name="genre_ids[]" class="form-control" multiple>
                                <option value="">ジャンルを選択してください。</option>
                                @foreach($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">本文</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    @csrf
                <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection