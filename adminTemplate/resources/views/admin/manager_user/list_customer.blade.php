@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>PassWord</th>
                <th style="width: 50px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Users as $key =>$User)
                <tr>
                    <td>{{$User->id}}</td>
                    <td>{{$User->name}}</td>
                    <td>{{$User->email}}</td>
                    <td>{{$User->password}}</td>
                    <td>&nbsp;</td>
                    {{-- <td style="text-align: center">
                        <a class="btn btn-primary btn-sm" href="/admin/Users/view/{{$User->id}}" style="width:30px">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" 
                            onclick="removeRow({{$User->id}}, '/admin/Users/destroy')" style="width:30px">
                            <i class="fas fa-trash"></i>
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