@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <h2>Daftar Postingan Blog</h2>
        <a href="{{ route('blog.create') }}" class="btn btn-primary">Buat Postingan Baru</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>
                            <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('blog.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
