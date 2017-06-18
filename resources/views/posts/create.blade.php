@extends('layouts.app')

@section('title', 'Create')

@section('styles')
<link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->name }}</div>
                <div class="panel-body">
                    <ul style="padding-left: 20px">
                        <li>Posts: 123</li>
                        <li>Likes Get: 123</li>
                        <li>Likes Given: 123</li>
                        <li><strong>Registered</strong> {{ date('H:i:s d/m/y', strtotime(Auth::user()->created_at)) }}</li>
                        <li><strong>Last Login</strong> {{ date('H:i:s d/m/y', strtotime(Auth::user()->last_login)) }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Thread</div>
                <div class="panel-body">
                    {{ Form::open(['route' => 'post.store']) }}
                            <div class="form-group">
                                {{ Form::label('subject', 'Thread Subject (Max 160 chars)') }}
                                {{ Form::text('subject', null, ['class' => 'form-control', 'id' => 'subject', 'maxlength' => '160', 'required' => 'required']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('editor', 'Content') }}
                                {{ Form::textarea('content', null, ['id' => 'editor']) }}
                            </div>
                            <button type="submit" class="btn btn-lg btn-success" id="submit_button"><i class="fa fa-rocket"></i>&nbsp;Post Thread</button>
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
            height: 300,
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
