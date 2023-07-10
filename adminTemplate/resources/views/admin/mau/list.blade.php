@extends('admin.main')

@section('content')
<div class="row w3-res-tb">
    <div class="col-sm-3">
    <form action="/tim-kiem-mau" method="POST">
        {{ csrf_field() }}
        <div class="input-group" style="display: flex; padding: 5px 0 5px 0;">
        <input type="text" name="keywords_submit" class="input-sm form-control" placeholder="Enter Color">
        <input type="submit" name="search_items" style="color:#000;margin-top: 0"class="btn btn-primary btn-sm" value="Tìm kiếm"/>
        </div>
    </form>
    </div>
</div>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">Id</th>
                <th>Tên màu</th>
                <th>Trạng thái</th>
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
                        <a class="btn btn-primary btn-sm" href="/admin/mau/add" style="width:30px; margin: 0 2px 0 2px;">
                            <span class="icon" title="Add Color"><i class="fas fa-plus"></i></span>
                        </a>
                        <a class="btn btn-primary btn-sm" href="/admin/mau/edit/{{$mau->id}}" style="width:30px">
                            <span class="icon" title="Edit Color"><i class="fas fa-edit"></i></span>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" 
                            onclick="removeRow({{$mau->id}}, '/admin/mau/destroy')" style="width:30px">
                            <span class="icon" title="Delete Color"><i class="fas fa-trash"></i></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $maus->links() !!}
@endsection