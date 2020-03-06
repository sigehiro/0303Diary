@extends('diaries.layout')
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
    <link rel="stylesheet" href="/css/app.css">
    <title>編集画面</title>
</head>
<body> --}}
    <section calss="container m-5">
        <div class="row justfy-content-center">
            <div class="col-8">
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $message)
                        <li class="alert alert-dander">{{$message}}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{route('diary.update',['id' => $diary->id]) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">タイトル</label>
                    <input type="text" class="form-control" name="title" id="title"  value="{{ old('title',$diary->title) }}">
                    </div>
                    <div class="form-group">
                        <label for="title">本文</label>
                        <textarea class="form-control" name="body" id ="body">{{ old('body',$diary->body ) }}</textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </form>            
            </div>
        </div>
    </section>
    @endsection
{{-- </body>
</html> --}}