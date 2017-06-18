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
