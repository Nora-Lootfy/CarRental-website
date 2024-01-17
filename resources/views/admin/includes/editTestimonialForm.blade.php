<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{route('updateTestimonial', $testimonial->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="name" required="required" class="form-control " name="name" value="{{$testimonial->name}}">
            @error('name')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Position <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="position" required="required" class="form-control " name="position" value="{{$testimonial->position}}">
            @error('position')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Comment <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <textarea id="content" name="comment" required="required" class="form-control">{{$testimonial->comment}}</textarea>
            @error('comment')
            {{$message}}
            @enderror
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Published</label>
        <div class="checkbox">
            <label>
                <input type="checkbox" class="flat" name="published" @checked($testimonial->published)>
            </label>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="file" id="image" name="image" class="form-control">
            <br>
            <img src="{{asset('assets/images/'. $testimonial->image)}}" alt="{{$testimonial->name}}" width="40%">
        </div>
    </div>
    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <button class="btn btn-primary" type="button">Cancel</button>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </div>

</form>
