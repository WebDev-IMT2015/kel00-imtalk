@extends('layouts.app')

@section('title', 'Home')

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
                            <tr>
                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>by A</td>
                                <td>1,000</td>
                                <td>15,000</td>
                                <td>19:28:45 18/06/17<br>by Anton</td>
                            </tr>
                            <tr>
                                <td>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <td>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
