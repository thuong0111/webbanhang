@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
  <div class="form-group">
    <label >Product</label>
    <select class="form-control" name="san_pham_id">
        @foreach ($sps as $sp)
          <option value="{{$sp->id}}">{{$sp->name}}</option>
        @endforeach
    </select>
  </div>

  <div class="form-group">
    <label >Size</label>
    <select class="form-control" name="size_id">
        @foreach ($sizes as $size)
          <option value="{{$size->id}}">{{$size->tensize}}</option>
        @endforeach
    </select>
  </div>

  <div class="form-group">
    <label >Color</label>
    <select class="form-control" name="mau_id">
        @foreach ($maus as $mau)
          <option value="{{$mau->id}}">{{$mau->tenmau}}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label>Quantity</label>
    <input type="number" name="SL" value="{{old('SL')}}" class="form-control">
  </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Add Detail</button>
    </div>
    @csrf
  </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection