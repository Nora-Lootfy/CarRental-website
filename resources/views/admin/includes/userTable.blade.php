<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>Registration Date</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Active</th>
        <th>Edit</th>
    </tr>
    </thead>


    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{date('d M Y',strtotime($user->created_at))}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>{{($user->active)? 'YES':'NO'}}</td>
            <td><a href="{{route('editUser', $user->id)}}"><img src="{{asset('assets/admin/images/edit.png')}}" alt="Edit"></td>
        </tr>
    @endforeach
    </tbody>
</table>
