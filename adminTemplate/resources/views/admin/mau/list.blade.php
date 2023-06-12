@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên Mau</th>
                <th>Active</th>
                <th style="width: 50px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($maus as $key =>$mau)
                
            
                <tr>
                    <td>{{$mau->id}}</td>
                    <td>{{$mau->tenmau}}</td>                    
                    <td>{!! \App\Helpers\Helper::active($mau->active) !!}</td>
                    <td style="text-align: center; display: flex;">
                        <a class="btn btn-primary btn-sm" href="/admin/mau/edit/{{$mau->id}}" style="width:30px">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" 
                            onclick="removeRow({{$mau->id}}, '/admin/mau/destroy')" style="width:30px">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $maus->links() !!}
@endsection