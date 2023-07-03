@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">Mã HD</th>
                <th>Tên</th>
                <th>SĐT</th>
                <th>Email</th>
                <th>Thời gian</th>
                <th>Thanh toán</th>
                <th>Trạng thái HD</th>
                <th>Tổng tiền</th>
                <th>Tiền Giảm Giá</th>
                <th>Tiền Phải Trả</th>
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
                    <td>{{$hoadon->tongtien}}</td>
                    <td>{{$hoadon->tiengg}}</td>
                    <td>{{$hoadon->tientra}}</td>
                    <td>&nbsp;</td>
                    <td style="text-align: center">
                        <a class="btn btn-primary btn-sm" href="/admin/customerslog/viewlog/{{$hoadon->id}}" style="width:30px">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        <form action="/capnhat2" method="POST">
                            @csrf
                            <input type="hidden" name="trangthaihd" value="2">
                            <input type="hidden" name="id" value="{{$hoadon->id}}">
                            <button type="submit" style="background: #007bff; border: none; width: 30px; 
                                height: 30px; border-radius: 3px;">
                                <i class="fa fa-truck" style="color: white"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="/capnhat3" method="POST">
                            @csrf
                            <input type="hidden" name="trangthaihd3" value="3">
                            <input type="hidden" name="idhoanthanh" value="{{$hoadon->id}}">
                            <button type="submit" style="background: #007bff; border: none; width: 30px; 
                                height: 30px; border-radius: 3px;">
                                <i class="fa fa-check" style="color: rgb(120, 243, 120)"></i></button>
                        </form>
                    </td>
                    <td style="text-align: center">
                        <a target="_blank" class="btn btn-primary btn-sm" href="/print/{{$hoadon->id}}" style="width:30px">
                            <i class="fa fa-print"></i>
                        </a>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div class="card-footer clear-fix">
        {!! $customers->links() !!}
    </div> --}}
    
@endsection