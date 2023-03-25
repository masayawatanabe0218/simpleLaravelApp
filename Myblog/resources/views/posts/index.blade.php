<!-- resources/views/posts/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>記事一覧</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>タイトル</th>
                    <th>投稿日時</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->content }}</td>
                        <td>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('posts.create') }}" class="btn btn-primary">新規投稿</a>
    </div>
@endsection
