@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
    <div class="card-body">
      <div class="form-group">
        <label for="">Name Discount</label>
        <input type="text" name="tengg" value="{{$size->tengg}}" class="form-control" >
      </div>
      <div class="form-group">
        <label for="">Discount Code</label>
        <input type="text" name="magg" value="{{$size->magg}}" class="form-control" >
      </div>
      <div class="form-group">
        <label for="">Quantity</label>
        <input type="text" name="slgg" value="{{$size->slgg}}" class="form-control" >
      </div>
      <div class="form-group">
        <label for="">Code Feature</label>
        <select class="form-control" name="tngg" value="{{$size->tngg}}">
            <option value="0">--- Choose ---</option>
              <option value="1">Reduce by Percent (%)</option>
              <option value="2">Reduce by moneys</option>
        </select>
      </div>
      <div class="form-group">
        <label for="">Enter percentage(%) or moneys reduce</label>
        <input type="text" name="sotiengg" value="{{$size->sotiengg}}" class="form-control" >
      </div>

      <div class="form-group">
        <label>Activated</label>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" type="radio" value="1" id="active" name="active" 
          {{-- nếu menu active ==1 thì sẽ check --}}
            {{$size->active == 1 ? 'checked = "" ':''}}>
          <label for="active" class="custom-control-label">Yes</label>
        </div>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" type="radio" value="0" id="no_active" name="active"
          {{$size->active == 0  ? 'checked = "" ':''}}>
          <label for="no_active" class="custom-control-label">No</label>
        </div>
      </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Update Discount</button>
    </div>
    @csrf
  </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection