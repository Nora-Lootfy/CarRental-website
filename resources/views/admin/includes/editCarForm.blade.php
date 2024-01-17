<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{route('updateCar', $car->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="title" required="required" class="form-control " name="title" value="{{$car->title}}">
            @error('title')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <textarea id="content"  required="required" class="form-control" name="description" >{{$car->description}}</textarea>
            @error('description')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label for="luggage" class="col-form-label col-md-3 col-sm-3 label-align">Luggage <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input id="luggage" class="form-control" type="number" name="luggage" required="required" value="{{$car->luggage}}">
            @error('luggage')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label for="doors" class="col-form-label col-md-3 col-sm-3 label-align">Doors <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input id="doors" class="form-control" type="number" name="doors" required="required" value="{{$car->doors}}">
            @error('doors')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label for="passengers" class="col-form-label col-md-3 col-sm-3 label-align">Passengers <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input id="passengers" class="form-control" type="number" name="passengers" required="required" value="{{$car->passengers}}">
            @error('passengers')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Price <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input id="price" class="form-control" type="number"  step="0.1" name="price" value="{{$car->price}}" required="required">
            @error('price')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
        <div class="checkbox">
            <label>
                <input type="checkbox" class="flat" name="active" @checked($car->active)>
            </label>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="file" id="image" name="image" class="form-control">
            <br>
            <img src="{{asset('assets/images/'.$car->image)}}" alt="{{$car->title}}" width="40%">
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="category">Category <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select class="form-control" name="category_id" id="category">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @selected($category->id==$car->category_id)>{{$category->name}}</option>
                @endforeach

            </select>
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
