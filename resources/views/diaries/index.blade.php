@extends('layouts.app')
{{-- layoutsファイルの中のappを使いますよということ。カミーユの時に作ったページでは、diariesの中にlayoutsのフォルダーを作っているからこの様な書き方になる。もしlayoutsが無かった場合には、(diaries.app)となるので注意。 nexseedの作ったテンプレートは間違っているので注意。認証機能作成時に('layout.app')に変更になる--}}

@section('title')
一覧
@endsection

@section('content')


{{-- <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css"> --}}
    {{-- publicのcssに入っている --}}
    {{-- <title>一覧表示</title>
</head> --}}
{{-- <body> --}}

<a href="{{ route('diary.create') }}" class="btn btn-primary btn-block">新規投稿</a>
    @foreach ($diaries as $diary)
        <div class="m-4 p-4 border border-primary">
            <p>{{ $diary->title }}</p>
            <p>{{ $diary->body }}</p>
            <p>{{ $diary->created_at }}</p>
            <a href="{{ route('diary.edit',['id'=> $diary->id]) }}" class="btn btn-success">編集</a>
            <form action="{{ route('diary.destroy',['id' => $diary->id]) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button class="btn btn-danger">削除</button>
            </form>
        </div>
    @endforeach
    @endsection
{{-- </body>
</html> --}}