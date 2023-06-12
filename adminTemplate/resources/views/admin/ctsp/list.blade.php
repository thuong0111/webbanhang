@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên SP</th>
                <th>Tên Size</th>
                <th>Tên Màu</th>
                <th>SL</th>
                <th style="width: 50px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ctsps as $key =>$ctsp)
                <tr>
                    <td>{{$ctsp->id}}</td>
                    <td>{{$ctsp->name}}</td>
                    <td>{{$ctsp->tensize}}</td>
                    <td>{{$ctsp->tenmau}}</td>
                    <td>{{$ctsp->SL}}</td>
                    <td style="text-align: center; display: flex;">
                        <a class="btn btn-primary btn-sm" href="/admin/ctsp/edit/{{$ctsp->id}}" style="width:30px">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" 
                            onclick="removeRow({{$ctsp->id}}, '/admin/ctsp/destroy')" style="width:30px">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    
@endsection