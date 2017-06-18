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

    public function store(Request $request, $id_post = null)
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

        $redirect = $post->id_post;
        $status = "Thread created!";

        if (!is_null($id_post)) {
            $post->reply_to = $id_post;
            $post->save();

            $thread = Post::find($id_post);
            $thread->last_reply = $request->user()->id_user;
            $thread->increment('reply_count');
            $thread->save();

            $redirect = $id_post;
            $status = "Thread replied succesfully!";
        }

        return redirect()->route('post.show', $redirect)->with('status', $status);
    }

    public function show(Request $request, $id_post)
    {
        $post = Post::find($id_post);
        if (is_null($post)) {
            return abort(404);
        }

        if (is_null($post->reply_to)) {
            $post->increment('view_count');
            $replies = Post::where('reply_to', $id_post)->get();
            return view('posts.show')->with('post', $post)->with('replies', $replies);
        } else {
            return redirect('/');
        }
    }
}
