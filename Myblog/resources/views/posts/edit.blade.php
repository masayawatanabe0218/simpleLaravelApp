@extends('layouts.app')

@section('content')
    <h1>記事の編集</h1>

    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="title">タイトル</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}">
        </div>
        <div>
            <label for="content">本文</label>
            <textarea name="content" id="content">{{ $post->content }}</textarea>
        </div>
        <button type="submit">更新する</button>
    </form>
@endsection
