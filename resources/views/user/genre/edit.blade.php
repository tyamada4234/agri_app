@extends('layouts.user')

@section('title', 'ジャンルの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ジャンルの編集</h2>
                <form action="{{ route('user.genre.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                                @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">ユーザID</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="user_id" value="{{ auth()->id() }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ジャンル名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $genre_form->name }}">

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $genre_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
