@extends('admin.main')

@section('content')
<div class="row w3-res-tb">
    <div class="col-sm-3">
    <form action="/tim-kiem-user" method="POST">
        {{ csrf_field() }}
        <div class="input-group" style="display: flex; padding: 5px 0 5px 0;">
        <input type="text" name="keywords_submit" class="input-sm form-control" placeholder="Enter Name">
        <input type="submit" name="search_items" style="color:#ffffff;margin-top: 0; background: #1d1f20"class="btn btn-primary btn-sm" value="Tìm kiếm"/>
        </div>
    </form>
    </div>
</div>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên</th>
                <th>Email</th>
                {{-- <th>PassWord</th> --}}
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th style="width: 50px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Users as $key =>$User)
                <tr>
                    <td>{{$User->id}}</td>
                    <td>{{$User->name}}</td>
                    <td>{{$User->email}}</td>
                    {{-- <td>{{$User->password}}</td> --}}
                    <td>{{$User->phone}}</td>
                    <td>{{$User->address}}</td>
                    <td>&nbsp;</td>
                    {{-- <td style="text-align: center; display:flex">
                        <a class="btn btn-primary btn-sm" href="/admin/customermanagers/view/{{$User->id}}" style="width:30px">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-footer clear-fix">
        {!! $Users->links() !!}
    </div>
    
@endsection