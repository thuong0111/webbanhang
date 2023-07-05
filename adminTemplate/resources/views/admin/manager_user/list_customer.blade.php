@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Name</th>
                <th>Account</th>
                {{-- <th>PassWord</th> --}}
                <th>Phone</th>
                <th>Adress</th>
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