<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div>
        <label for="title">タイトル</label>
        <input type="text" name="title" id="title">
    </div>
    <div>
        <label for="content">本文</label>
        <textarea name="content" id="content"></textarea>
    </div>
    <button type="submit">投稿する</button>
</form>
