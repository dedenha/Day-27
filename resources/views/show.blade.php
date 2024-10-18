@extends('layouts.app')

@section('content')
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>

    <!-- Kategori dan Tag Postingan -->
    <p>Category: {{ $post->category->name }}</p>
    <p>Tags:
        @foreach ($post->tags as $tag)
            {{ $tag->name }},
        @endforeach
    </p>

    <!-- Tombol Berbagi Sosial -->
    <p>Share:
        <a
            href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($post->title) }}">Twitter</a>
        <a href="https://www.facebook.com/sharer.php?u={{ urlencode(request()->fullUrl()) }}">Facebook</a>
        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}">LinkedIn</a>
    </p>

    <!-- Komentar -->
    <h4>Comments</h4>
    <ul>
        @foreach ($post->comments as $comment)
            <li>{{ $comment->comment }}</li>
        @endforeach
    </ul>

    <!-- Form Tambah Komentar -->
    <form action="{{ route('comments.store', $post->id) }}" method="POST">
        @csrf
        <textarea name="comment" required></textarea>
        <button type="submit">Add Comment</button>
    </form>
@endsection
