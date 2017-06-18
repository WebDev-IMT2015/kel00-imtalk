<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>{{ Auth::user()->name }}</strong></div>
        <div class="panel-body">
            <ul style="padding-left: 20px">
                <li>Posts: {{ App\Models\Post::where('id_user', Auth::user()->id_user)->count() }}</li>
                <li>Likes Get: 123</li>
                <li>Likes Given: 123</li>
                <li><strong>Registered</strong> {{ date('H:i:s d/m/Y', strtotime(Auth::user()->created_at)) }}</li>
                <li><strong>Last Login</strong> {{ date('H:i:s d/m/Y', strtotime(Auth::user()->last_login)) }}</li>
            </ul>
        </div>
    </div>
</div>
