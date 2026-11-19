<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /** Menampilkan seluruh postingan terbaru. */
    public function index()
    {
        // Ambil postingan dengan urutan terbaru untuk ditampilkan di daftar.
        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    /** Menampilkan formulir pembuatan postingan. */
    public function create()
    {
        return view('posts.create');
    }

    /** Memvalidasi lalu menyimpan postingan baru. */
    public function store(Request $request)
    {
        // Batasi masukan agar judul dan konten wajib tersedia dengan format yang sesuai.
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
        ]);

        // Simpan hanya nilai yang telah lolos validasi.
        Post::create($validated);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Postingan berhasil ditambahkan.');
    }

    /** Menghapus postingan dan kembali ke daftar. */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Postingan berhasil dihapus.');
    }
}
