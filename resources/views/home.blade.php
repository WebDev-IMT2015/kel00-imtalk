@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    @include('layouts.status')
    <div class="row">
        @include('layouts.widget')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading" style="padding-bottom: 20px">Threads <span class="pull-right"><a href="{{ route('post.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;New Thread</a></span></div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Replies</th>
                                <th>Views</th>
                                <th>Last Post</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td><a href="{{ route('post.show', $post->id_post) }}">{{ $post->subject }}</a><br>by {{ App\Models\User::find($post->id_user)->name }}</td>
                                <td>{{ $post->reply_count }}</td>
                                <td>{{ $post->view_count }}</td>
                                <td>{{ date('H:i:s d/m/Y', strtotime($post->updated_at)) }}<br>by {{ App\Models\User::find($post->last_reply)->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
