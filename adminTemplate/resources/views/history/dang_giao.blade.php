<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>

    <body >

        <!-- Header -->
        @include('header')
                <div class="container">
                    <div class="row" style="margin-top: 134px;">
                         <div class="VYJdTQ">
                             <a href="/history" class="OFl2GI" style="">
                                 <span class="_20hgQK">Tất cả</span>
                             </a>
                             <a href="/HoaDonDangXuLy" class="OFl2GI"><span class="_20hgQK">Đang xử lý</span></a>
                             <a href="/HoaDonDangGiao" class="OFl2GI gAImis"><span class="_20hgQK">Đang giao</span></a>
                             <a href="/HoaDonDaHoanThanh" class="OFl2GI"><span class="_20hgQK">Hoàn thành</span></a>
                             <a href="/HoaDonDaHuy" class="OFl2GI"><span class="_20hgQK">Đã hủy</span></a>
                         </div>
                        <div class="col-lg-10 m-lr-auto m-b-50">
                            <div class="m-l-25 m-r--38 m-lr-0-xl">
                                <div class="wrap-table-shopping-cart">
                                    <table class="table-shopping-cart">
                                        <tbody>
                                        <tr class="table_head">
                                            <th class="column-1" style="width:50px; text-align: center">Mã HD</th>
                                            <th class="column-5" style="text-align: center">Thời Gian</th>
                                            <th class="column-6" style="text-align: center">Thanh Toán</th>
                                            <th class="column-7" style="text-align: center">Trạng Thái HD</th>
                                            <th class="column-8" style="text-align: center">Tổng Tiền</th>
                                            <th style="width: 50px;text-align: center">&nbsp;</th>
                                            <td style="width: 50px;text-align: center">&nbsp;</td>
                                            <td style="width: 50px;text-align: center">&nbsp;</td>
                                        </tr>
                                        @foreach ($hoadons_dg as $key =>$hoadon)
                                        <tr>
                                            <td style="text-align: center">{{$hoadon->id}}</td>
                                            <td style="text-align: center">{{$hoadon->thoigian}}</td>
                                            <td style="text-align: center">{{$hoadon->tenthanhtoan}}</td>
                                            <td style="text-align: center">{{$hoadon->tenTT}}</td>
                                            <td style="text-align: center">{{$hoadon->tongtien}}</td>
                                            <td style="text-align: center">&nbsp;</td>
                                            <td style="text-align: center">
                                                <a class="btn btn-primary btn-sm" href="/history/{{$hoadon->id}}" style="width:30px">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                            @if ($hoadon->ds_trang_thai_id<3)
                                            <td style="text-align: center">
                                                <form action="/capnhathuy" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="trangthaihd4" value="4">
                                                    <input type="hidden" name="idhoadonhuy" value="{{$hoadon->id}}">
                                                    <button type="submit" style="background: red; border: none; width: 30px; 
                                                        height: 30px; border-radius: 3px;"><i class="fas fa-trash" style="color: white"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <!-- Footer -->
        @include('footer')

    </body>
</html>
@section('content')
    <form class="bg0 p-t-130 p-b-85">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="wrap-table-shopping-cart">
                                <table class="table-shopping-cart">
                                    <tbody>
                                    <tr class="table_head">
                                        <th class="column-1">Sản Phẩm</th>
                                        <th class="column-2"></th>
                                        <th class="column-3">Giá</th>
                                        <th class="column-4">Số Lượng</th>
                                        <th class="column-5">Thành Tiền</th>
                                        <th class="column-6" style="width: 60px; text-align: center">Size</th>
                                        <th class="column-7" style="width: 60px; text-align: center">Mau</th>
                                        <th class="column-8" >&nbsp;</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </form>

@endsection
