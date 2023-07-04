@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Name Discount</th>
                <th>Discount Code</th>
                <th>Quantity</th>
                <th>Discount type</th>
                <th>Moneys Or Percent</th>
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
                    <td>Reduce by Percent (%)</td>
                    @else
                    <td>Reduce by Percent (%)</td>
                    @endif

                    @if($size->tngg==1)
                    <td>{{ $size->sotiengg}} %</td>
                    @else
                    <td>{{ number_format($size->sotiengg)}} VND</td>
                    @endif
                    <td>{!! \App\Helpers\Helper::active($size->active) !!}</td>
                    <td style="text-align: center;display: flex;">
                        <a class="btn btn-primary btn-sm" href="/admin/giamgia/add" style="width:30px">
                            <span class="icon" title="Add"><i class="fas fa-plus"></i></span>
                        </a>
                        <a class="btn btn-primary btn-sm" href="/admin/giamgia/edit/{{$size->id}}" style="width:30px; margin: 0 2px 0 2px;">
                            <span class="icon" title="Edit"><i class="fas fa-edit"></i></span>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" 
                            onclick="removeRow({{$size->id}}, '/admin/giamgia/destroy')" style="width:30px">
                            <span class="icon" title="Delete"><i class="fas fa-trash"></i></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $sizes->links() !!}
@endsection