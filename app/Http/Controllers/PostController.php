<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'subject'            => 'required',
            'content'            => 'required',
        ]);

        $post = new Post;
        $post->id_user = $request->user()->id_user;
        $post->subject = $request->input('subject');
        $post->content = $request->input('content');
        $post->last_reply = $request->user()->id_user;
        $post->save();

        return redirect()->route('home')->with('status', 'Pengiriman Email Blast berhasil!');
    }
}
