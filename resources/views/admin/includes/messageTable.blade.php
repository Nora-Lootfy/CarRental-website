<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Show</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>

    @foreach($messages as $content)
        <tr>
            <td>{{$content->first_name . ' '. $content->last_name}}</td>
            <td>{{$content->email}}</td>
            <td><a href="{{route('showMessage', $content->id)}}"><img src="{{asset('assets/admin/images/edit.png')}}" alt="Edit"></a></td>
            <td><a href="{{route('destroyMessage', $content->id)}}" onclick="return confirm('Are you sure you want to delete?')"><img src="{{asset('assets/admin/images/delete.png')}}" alt="Delete"></a></td>
        </tr>
    @endforeach



    </tbody>
</table>
