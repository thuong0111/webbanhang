@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
    <div class="card-body">
      <div class="form-group">
        <label for="menu">Name Product</label>
        <input type="text" name="name" class="form-control" value="{{$productt->name}}" placeholder="Enter name">
      </div>

      <div class="form-group">
        <label >Category</label>
        <select class="form-control" name="menu_id">
            @foreach ($menus as $menu)
                <option value="{{$menu->id}}" {{$productt->menu_id == $menu->id ? 'selected' : ''}}>
                    {{$menu->name}}
                </option>
            @endforeach
        </select>
      </div>

      <div class="form-group">
        <label>Price</label>
        <input type="number" name="price" value="{{$productt->price}}" class="form-control">
      </div>
      
      <div class="form-group">
        <label>Price Sale</label>
        <input type="number" name="price_sale" value="{{$productt->price_sale}}" class="form-control">
      </div>

      
      <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control">{{$productt->description}}</textarea>
      </div>

      <div class="form-group">
        <label>Description Detail</label>
        <textarea id="content" name="content" class="form-control">{{$productt->content}}</textarea>
      </div>
      
      <div class="form-group">
        <label for="menu">Image Product</label>
        <input type="file" class="form-control" id="upload">
        <div id="image_show">
            <img src="{{$productt->thumb}}" width="100px" alt="Error IMG">
        </div>
        <input type="hidden" name="thumb" value="{{$productt->thumb}}" id="thumb">
      </div>

      <div class="form-group">
        <label>Activated</label>
        <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" value="1" id="active" name="active"
                {{$productt->active == 1 ? ' checked=""' : ''}}>
            <label for="active" class="custom-control-label">Yes</label>
        </div>
        <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" value="0" id="no_active" name="active"
            {{$productt->active == 0 ? ' checked=""' : ''}}>
            <label for="no_active" class="custom-control-label">No</label>
        </div>
      </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Update Product</button>
    </div>
    @csrf
  </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection