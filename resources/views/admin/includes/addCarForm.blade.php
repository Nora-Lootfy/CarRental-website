@if(count($categories) === 0)
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
            <h1 class="display-1">No categories</h1>
            <p class="mb-4">Try adding categories first then back to classes to add them.</p>
            <a class="btn btn-primary rounded-pill py-3 px-5" href="{{route('createCategory')}}">Add a new Category</a>
        </div>
    </div>
@else
<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{route('storeCar')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="title" required="required" class="form-control " name="title" value="{{old('title')}}">
            @error('title')
                {{$message}}
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <textarea id="content"  required="required" class="form-control" name="description" >Contents</textarea>
            @error('description')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label for="luggage" class="col-form-label col-md-3 col-sm-3 label-align">Luggage <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input id="luggage" class="form-control" type="number" name="luggage" required="required" value="{{old('luggage')}}">
            @error('luggage')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label for="doors" class="col-form-label col-md-3 col-sm-3 label-align">Doors <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input id="doors" class="form-control" type="number" name="doors" required="required" value="{{old('doors')}}">
            @error('doors')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label for="passengers" class="col-form-label col-md-3 col-sm-3 label-align">Passengers <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input id="passengers" class="form-control" type="number" name="passengers" required="required" value="{{old('passengers')}}">
            @error('passengers')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Price <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input id="price" class="form-control" type="number"  step="0.1" name="price" value="{{old('price')}}" required="required">
            @error('price')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
        <div class="checkbox">
            <label>
                <input type="checkbox" class="flat" name="active" @checked(old('active')!==null)>
            </label>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="file" id="image" name="image" required="required" class="form-control">
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="category">Category <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select class="form-control" name="category_id" id="category">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach

            </select>
        </div>
    </div>
    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <button class="btn btn-primary" type="button">Cancel</button>
            <button type="submit" class="btn btn-success">Add</button>
        </div>
    </div>

</form>
@endif
