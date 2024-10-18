<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create($request->all());
        return redirect()->route('blog.index')->with('success', 'Postingan berhasil dibuat.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.blog.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect()->route('blog.index')->with('success', 'Postingan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('blog.index')->with('success', 'Postingan berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $posts = Post::where('title', 'LIKE', "%$query%")->get();
        return view('admin.blog.index', compact('posts'));
    }
}
