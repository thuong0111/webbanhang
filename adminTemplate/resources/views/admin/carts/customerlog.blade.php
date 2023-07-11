@extends('admin.main')

@section('content')
  <style>
    .icon {
      cursor: pointer;
    }
    .VYJdTQ {
    width: 100%;
    margin-bottom: 12px;
    display: flex;
    overflow: hidden;
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    z-index: 10;
    background: #fff;
    border-top-left-radius: 2px;
    border-top-right-radius: 2px
    }
    .OFl2GI {
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        padding: 16px 0;
        font-size: 20px;
        line-height: 24px;
        text-align: center;
        color: rgba(0,0,0,.8);
        background: #fff;
        border-bottom: 2px solid rgba(0,0,0,.09);
        display: flex;
        flex: 1;
        overflow: hidden;
        align-items: center;
        justify-content: center;
        transition: color .2s;
        text-decoration: none;
    }

    .gAImis,.OFl2GI:hover {
        color:  #007bff
    }

    .gAImis {
        border-color:  #007bff
    }

    ._20hgQK {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap
    }
  </style>
    <div class="row w3-res-tb">
        <div class="col-sm-3">
        <form action="/tim-kiem-bill" method="POST">
            {{ csrf_field() }}
            <div class="input-group" style="display: flex; padding: 5px 0 5px 0;">
            <input type="text" name="keywords_submit" class="input-sm form-control" placeholder="Nhập tên KH">
            <input type="submit" name="search_items" style="color:#000;margin-top: 0"class="btn btn-primary btn-sm" value="Tìm kiếm"/>
            </div>
        </form>
        </div>
    </div>
    <div class="VYJdTQ">
    <a href="customerslog" class="OFl2GI gAImis" style="">
        <span class="_20hgQK">Tất cả</span>
    </a>
    <a href="bill_processing" class="OFl2GI"><span class="_20hgQK">Đang xử lý</span></a>
    <a href="bill_delivering" class="OFl2GI"><span class="_20hgQK">Đang giao</span></a>
    <a href="bill_finish" class="OFl2GI"><span class="_20hgQK">Hoàn thành</span></a>
    <a href="bill_cancel" class="OFl2GI"><span class="_20hgQK">Đã hủy</span></a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>SĐT</th>
                <th>Email</th>
                <th>Thời gian</th>
                <th>PTTT</th>
                <th>Trạng thái</th>
                <th>Tổng tiền</th>
                <th>Giá giảm</th>
                <th>Tiền trả</th>
                <th>Chức năng</th>
                <th style="width: 50px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hoadons as $key =>$hoadon)
                <tr>
                    <td>{{$hoadon->id}}</td>
                    <td>{{$hoadon->name}}</td>
                    <td>{{$hoadon->phone}}</td>
                    <td>{{$hoadon->email}}</td>
                    <td>{{$hoadon->thoigian}}</td>
                    <td>{{$hoadon->tenthanhtoan}}</td>
                    <td>{{$hoadon->tenTT}}</td>
                    <td>{{number_format($hoadon->tongtien).' '.' VND'}}</td>
                    <td>{{number_format($hoadon->tiengg).' '.' VND'}}</td>
                    <td>{{number_format($hoadon->tientra).' '.' VND'}}</td>
                    <td>&nbsp;</td>
                    {{-- <td>{{number_format($hoadon->tongtien, '0', '', '.')}}</td>
                    <td>{{number_format($hoadon->tiengg, '0', '', '.')}}</td>
                    <td>{{number_format($hoadon->tientra, '0', '', '.')}}</td> --}}
                    <td style="text-align: center">
                        <a class="btn btn-primary btn-sm" href="/admin/customerslog/viewlog/{{$hoadon->id}}" style="width:30px;
                            margin-bottom:2px">
                            <span class="icon" title="Xem Chi TIết"><i class="fas fa-eye"></i></span>
                        </a>
                        <form action="/capnhat2" method="POST">
                            @csrf
                            <input type="hidden" name="trangthaihd" value="2">
                            <input type="hidden" name="id" value="{{$hoadon->id}}">
                            <button type="submit" style="background: #007bff; border: none; width: 30px; 
                                height: 30px; border-radius: 3px; margin-bottom:2px">
                                <span class="icon" title="Đang Giao">
                                    <i class="fa fa-truck" style="color: white"></i>
                                </span>
                            </button>
                        </form>

                        <form action="/capnhat3" method="POST">
                            @csrf
                            <input type="hidden" name="trangthaihd3" value="3">
                            <input type="hidden" name="idhoanthanh" value="{{$hoadon->id}}">
                            <button type="submit" style="background: #007bff; border: none; width: 30px; 
                                height: 30px; border-radius: 3px; margin-bottom:2px">
                                <span class="icon" title="Hoàn Thành">
                                    <i class="fa fa-check" style="color: rgb(120, 243, 120)"></i>
                                </span>
                            </button>
                        </form>
                        <a target="_blank" class="btn btn-primary btn-sm" href="/print/{{$hoadon->id}}" style="width:30px">
                            <span class="icon" title="In Hóa Đơn">
                                <i class="fa fa-print"></i>
                            </span>
                        </a>
                    </td>
                    <td>&nbsp;</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-footer clear-fix">
        {!! $hoadons->links() !!}
    </div>
    
@endsection