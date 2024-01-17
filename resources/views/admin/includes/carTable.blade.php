<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>Title</th>
        <th>Price</th>
        <th>Active</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>


    <tbody>
    @foreach($cars as $car)
        <tr>
            <td>{{$car->title}}</td>
            <td>{{$car->price}}</td>
            <td>{{($car->active)? 'YES':'NO'}}</td>
            <td><a href="{{route('editCar', $car->id)}}"><img src="{{asset('assets/admin/images/edit.png')}}" alt="Edit"></a></td>
            <td><a href="{{route('destroyCar', $car->id)}}" onclick="return confirm('Are you sure you want to delete?')"><img src="{{asset('assets/admin/images/delete.png')}}" alt="Delete"></a></td>
        </tr>
    @endforeach

    </tbody>
</table>
