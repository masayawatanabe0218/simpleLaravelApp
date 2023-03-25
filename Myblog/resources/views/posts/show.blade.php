@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>

    <p>{{ $post->content }}</p>

    <p>作成日時: {{ $post->created_at }}</p>
    <p>更新日時: {{ $post->updated_at }}</p>

    <a href="{{ route('posts.edit', $post) }}">編集する</a>
@endsection
