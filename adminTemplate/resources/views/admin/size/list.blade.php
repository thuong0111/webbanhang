@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên Size</th>
                <th>Active</th>
                <th style="width: 50px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sizes as $key =>$size)
                
            
                <tr>
                    <td>{{$size->id}}</td>
                    <td>{{$size->tensize}}</td>                    
                    <td>{!! \App\Helpers\Helper::active($size->active) !!}</td>
                    <td style="text-align: center;">
                        <a class="btn btn-primary btn-sm" href="/admin/size/edit/{{$size->id}}" style="width:30px">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" 
                            onclick="removeRow({{$size->id}}, '/admin/size/destroy')" style="width:30px">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $sizes->links() !!}
@endsection