@extends('layouts.user')

@section('title', '登録済みジャンルの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>ジャンル一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
            <a href="{{ route('user.genre.add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('user.genre.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">ジャンル名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_name" value="{{ $cond_name }}">
                        </div>
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">ジャンル名</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($genres as $genre)
                                <tr>
                                    <th>{{ $genre->id }}</th>
                                    <td>{{ Str::limit($genre->name, 100) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('user.genre.edit', ['id' => $genre->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ route('user.genre.delete', ['id' => $genre->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
