<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <h2>Full Name: {{$content->first_name . ' ' .$content->last_name}}</h2>
            <br>
            <h2>Email: {{$content->email}}</h2>
            <br>
            <h2>Message Content:</h2>
            <p>{{$content->message}}</p>
        </div>
    </div>
</div>
