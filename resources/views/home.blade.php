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
                        <li><strong>Join Date</strong> {{ date('H:i:s d/m/y', strtotime(Auth::user()->created_at)) }}</li>
                        <li><strong>Last Login</strong> {{ date('H:i:s d/m/y', strtotime(Auth::user()->last_login)) }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading" style="padding-bottom: 20px">Topics <span class="pull-right"><button class="btn btn-sm btn-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;New Topic</button></span></div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Views</th>
                                <th>Replies</th>
                                <th>Last Reply</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th>3</th>
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
