@extends('layouts.app')

@section('title', 'Create')

@section('styles')
<link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    @include('layouts.status')
    <div class="row">
        <div class="col-md-12">
            <p>
                <a href="{{ route('home') }}" class="btn btn-sm btn-primary"><i class="fa fa-home"></i>&nbsp;&nbsp;Back to Home</a>
                <span class="pull-right"><a href="#reply" class="btn btn-sm btn-success"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Post Reply</a></span>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>{{ $post->subject }}</strong><span class="pull-right">Viewed {{ $post->view_count }} times</span></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h4>{{ App\Models\User::find($post->id_user)->name }}</h4>
                            <ul style="padding-left: 20px">
                                <li>Likes Get: 123</li>
                                <li>Likes Given: 123</li>
                                <li><strong>Registered</strong> {{ date('H:i:s d/m/Y', strtotime(Auth::user()->created_at)) }}</li>
                                <li><strong>Last Login</strong> {{ date('H:i:s d/m/Y', strtotime(Auth::user()->last_login)) }}</li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <p><strong>{{ date('H:i:s d/m/Y', strtotime($post->created_at)) }}</strong></p>
                            <p>{!! $post->content !!}</p>
                        </div>
                    </div>
                    @foreach($replies as $reply)
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <?php $user = App\Models\User::find($reply->id_user); ?>
                            <h4>{{ $user->name }}</h4>
                            <ul style="padding-left: 20px">
                                <li>Posts: 123</li>
                                <li>Likes Get: 123</li>
                                <li>Likes Given: 123</li>
                                <li><strong>Registered</strong> {{ date('H:i:s d/m/Y', strtotime($user->created_at)) }}</li>
                                <li><strong>Last Login</strong> {{ date('H:i:s d/m/Y', strtotime($user->last_login)) }}</li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <p><strong>{{ $reply->created_at }}</strong></p>
                            <p>{!! $reply->content !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"><a name="reply"></a></div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Replying to <strong>{{ $post->subject }}</strong></div>
                <div class="panel-body">
                    {{ Form::open(['route' => ['post.reply', $post->id_post]]) }}
                        {{ Form::hidden('subject', $post->subject) }}
                        <div class="form-group">
                            {{ Form::textarea('content', null, ['id' => 'editor']) }}
                        </div>
                        <button type="submit" class="btn btn-lg btn-success" id="submit_button"><i class="fa fa-rocket"></i>&nbsp;Post Reply</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/summernote.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#editor').summernote({
            height: 150,
            focus: true,
            toolbar: [
                ['style', ['style']],
                ['fontstyle', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontprop', ['fontname', 'fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph', 'height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video', 'hr']],
                ['view', ['fullscreen', 'codeview', 'undo', 'redo','help']]
            ],
        });

        var postForm = function() {
            return $('textarea[name="content"]').html($('#editor').code());
        }
    });
</script>
@endsection
