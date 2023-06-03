@extends('admin.main')

@section('content')
<form action="" method="POST">
    <div class="card-body">
      <div class="form-group">
        <label for="menu">Tên Mau</label>
        <input type="text" name="tenmau" class="form-control" value="{{old('tenmau')}}" placeholder="Enter ">
      </div>

      <div class="form-group">
        <label>Activated</label>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" type="radio" value="1" id="active" name="active" checked="">
          <label for="active" class="custom-control-label">Yes</label>
        </div>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" type="radio" value="0" id="no_active" name="active">
          <label for="no_active" class="custom-control-label">No</label>
        </div>
      </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Add Size</button>
    </div>
    @csrf
  </form>
@endsection
