@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
    <div class="card-body">
      <div class="form-group">
        <label for="">Tên mã giảm giá</label>
        <input type="text" name="tengg" class="form-control" placeholder="Tên Mã Giảm Giá">
      </div>

      <div class="form-group">
        <label for="">Mã giảm giá</label>
        <input type="text" name="magg" class="form-control" placeholder="Mã Giảm Giá">
      </div>

      <div class="form-group">
        <label for="">Số lượng mã</label>
        <input type="text" name="slgg" class="form-control" placeholder="Số lượng">
      </div>

      <div class="form-group">
        <label for="">Tính năng mã</label>
        <select class="form-control" name="tngg">
            <option value="0">--- Chọn ---</option>
              <option value="1">Giảm theo %</option>
              <option value="2">Giảm theo tiền</option>
        </select>
      </div>

      <div class="form-group">
        <label for="">Nhập số % hoặc tiền giảm</label>
        <input type="text" name="sotiengg" class="form-control" placeholder="Tên Mã Giảm Giá">
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
      <button type="submit" class="btn btn-primary">Add</button>
    </div>
    @csrf
  </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection