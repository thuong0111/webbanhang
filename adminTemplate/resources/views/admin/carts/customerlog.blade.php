@extends('admin.main')

@section('content')
  <style>
    .icon {
      cursor: pointer;
    }
  </style>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Time</th>
                <th>Payment</th>
                <th>Active</th>
                <th>Total</th>
                <th>Sale</th>
                <th>Payables</th>
                <th>Options</th>
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
                    <td style="text-align: center">
                        <a class="btn btn-primary btn-sm" href="/admin/customerslog/viewlog/{{$hoadon->id}}" style="width:30px">
                            <span class="icon" title="View Order"><i class="fas fa-eye"></i></span>
                        </a>
                        <form action="/capnhat2" method="POST">
                            @csrf
                            <input type="hidden" name="trangthaihd" value="2">
                            <input type="hidden" name="id" value="{{$hoadon->id}}">
                            <button type="submit" style="background: #007bff; border: none; width: 30px; 
                                height: 30px; border-radius: 3px;">
                                <span class="icon" title="Delivering">
                                    <i class="fa fa-truck" style="color: white"></i>
                                </span>
                            </button>
                        </form>

                        <form action="/capnhat3" method="POST">
                            @csrf
                            <input type="hidden" name="trangthaihd3" value="3">
                            <input type="hidden" name="idhoanthanh" value="{{$hoadon->id}}">
                            <button type="submit" style="background: #007bff; border: none; width: 30px; 
                                height: 30px; border-radius: 3px;">
                                <span class="icon" title="Finish">
                                    <i class="fa fa-check" style="color: rgb(120, 243, 120)"></i>
                                </span>
                            </button>
                        </form>
                        <a target="_blank" class="btn btn-primary btn-sm" href="/print/{{$hoadon->id}}" style="width:30px">
                            <span class="icon" title="Print Bill">
                                <i class="fa fa-print"></i>
                            </span>
                        </a>
                    </td>
                    <td>&nbsp;</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div class="card-footer clear-fix">
        {!! $customers->links() !!}
    </div> --}}
    
@endsection