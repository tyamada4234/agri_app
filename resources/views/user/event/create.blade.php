{{-- layouts/user.blade.phpを読み込む --}}
@extends('layouts.user')

{{-- user.blade.phpの@yield('title')に'イベントの新規登録'を埋め込む --}}
@section('title', 'イベントの新規登録')

{{-- user.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>イベント新規作成</h2>
            </div>
        </div>
    </div>
@endsection

<!--
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" Content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Agri_App</title>
    </head>
    <body>
        <h1>イベント登録画面</h1>
    </body>
</html>
-->