@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Name Product</th>
                <th>Name Size</th>
                <th>Name Color</th>
                <th>Quantity</th>
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
                        <a class="btn btn-primary btn-sm" href="/admin/ctsp/add" style="width:30px">
                            <span class="icon" title="Add"><i class="fas fa-plus"></i></span>
                        </a>
                        <a class="btn btn-primary btn-sm" href="/admin/ctsp/edit/{{$ctsp->id}}" style="width:30px; margin: 0 2px 0 2px;">
                            <span class="icon" title="Edit"><i class="fas fa-edit"></i></span>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" 
                            onclick="removeRow({{$ctsp->id}}, '/admin/ctsp/destroy')" style="width:30px">
                            <span class="icon" title="Delete"><i class="fas fa-trash"></i></span>
                        </a>
                    </td>
                    <th>&nbsp;</th>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    
@endsection