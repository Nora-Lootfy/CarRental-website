<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>Category Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>


    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{$category->name}}</td>
            <td><a href="{{route('editCategory', $category->id)}}"><img src="{{asset('assets/admin/images/edit.png')}}" alt="Edit"></a></td>
            <td><a href="{{route('destroyCategory', $category->id)}}" onclick="return confirm('Are you sure you want to delete?')"><img src="{{asset('assets/admin/images/delete.png')}}" alt="Delete"></a></td>
        </tr>
    @endforeach
    </tbody>
</table>
