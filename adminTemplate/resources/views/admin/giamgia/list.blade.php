@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên Giảm Giá</th>
                <th>Mã Giảm Giá</th>
                <th>Số Lượng</th>
                <th>Hình thức</th>
                <th>Số tiền hoặc %</th>
                <th>Active</th>
                <th style="width: 50px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sizes as $key =>$size)
                <tr>
                    <td>{{$size->id}}</td>
                    <td>{{$size->tengg}}</td>                    
                    <td>{{$size->magg}}</td>
                    <td>{{$size->slgg}}</td>
                    @if($size->tngg==1)
                    <td>Giảm theo %</td>
                    @else
                    <td>Giảm theo số tiền</td>
                    @endif

                    @if($size->tngg==1)
                    <td>{{ $size->sotiengg}} %</td>
                    @else
                    <td>{{ number_format($size->sotiengg)}} VND</td>
                    @endif

                    <td style="text-align: center;display: flex;">
                        <a class="btn btn-primary btn-sm" href="/admin/giamgia/edit/{{$size->id}}" style="width:30px">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" 
                            onclick="removeRow({{$size->id}}, '/admin/giamgia/destroy')" style="width:30px">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $sizes->links() !!}
@endsection