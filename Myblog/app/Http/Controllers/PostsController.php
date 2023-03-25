<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        // 全ての記事を取得する
        $posts = Post::all();
    
        // 記事一覧を表示するためのビューに、取得した記事一覧を渡す
        return view('posts.index', compact('posts'));
    }    

    public function test()
    {
        return view('test.test');
    }    


    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->created_at = now();
        $post->updated_at = now();
        $post->save();
        return redirect()->route('posts.index');
    }
    
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }
    

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }
    

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->updated_at = now();
        $post->save();
        return redirect()->route('posts.show', $post);
    }
    

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    
        return redirect()->route('posts.index');
    }
}