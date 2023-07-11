@extends('admin.main')

@section('content')
    <div class="row w3-res-tb" style="padding: 5px 0 5px 0px;">
        <div class="col-sm-3">
          <form action="/tim-kiem-category" method="POST">
              {{ csrf_field() }}
              <div class="input-group" style="display: flex;">
              <input type="text" name="keywords_submit" class="input-sm form-control" placeholder="Nhập tên danh mục">
              <input type="submit" name="search_items" style="color:#000;margin-top: 0"class="btn btn-primary btn-sm" value="Tìm kiếm"/>
              </div>
          </form>
        </div>
        <a class="btn btn-primary btn-sm" href="/admin/menus/add">
            <span class="icon" title="Thêm" style="font-size: 19px"><i class="fas fa-plus"></i></span>
        </a>
      </div>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên Loại</th>
                <th>Trạng Thái</th>
                <th>Mô tả</th>
                <th>Slug</th>
                <th>Thời gian</th>
                <th style="width: 50px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::menu($menus) !!}
        </tbody>
    </table>
@endsection