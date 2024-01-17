<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Published</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($testimonials as $testimonial)
        <tr>
            <td>{{$testimonial->name}}</td>
            <td>{{$testimonial->position}}</td>
            <td>{{($testimonial->published)? 'YES':'NO'}}</td>
            <td><a href="{{route('editTestimonial', $testimonial->id)}}"><img src="{{asset('assets/admin/images/edit.png')}}" alt="Edit"></a></td>
            <td><a href="{{route('destroyTestimonial', $testimonial->id)}}" onclick="return confirm('Are you sure you want to delete?')"><img src="{{asset('assets/admin/images/delete.png')}}" alt="Delete"></a></td>
        </tr>
    @endforeach



    </tbody>
</table>
