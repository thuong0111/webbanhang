@extends('admin.main')

@section('content')
  <div class="row">
    <form autocomplete="off" style="width:100%;display: inline-flex">
      @csrf
      <div class="col-md-2">
        <p>Từ Ngày: <input type="text" id="datepicker" class="form-control"></p>
        <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm " value="Lọc Kết Quả">
      </div>

      <div class="col-md-2">
        <p>Đến Ngày: <input type="text" id="datepicker2" class="form-control"></p>
      </div>

      <div class="col-md-2">
        <p>Lọc theo: 
          <select class="dashboard-filter form-control">
            <option>--Chọn--</option>
            <option value="7ngay">7 Ngày qua</option>
            <option value="thangtruoc">Tháng trước</option>
            <option value="thangnay">Tháng này</option>
            <option value="365ngayqua">365 ngày qua</option>
          </select>
        </p>
      </div>
    </form>
    <div class="col-md-12" id="chart" style="height: 250px;"></div>
  </div>
  <div class="row">
    <div class="col-md-4 col-xs-12">
      <p class="title_thongke">Thong ke tong san pham don hang</p>
      <div class="morris-donus-inverse" id="donut"></div>

    </div>
  </div>


@endsection