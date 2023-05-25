@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>The order date</th>
                <th style="width: 50px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $key =>$customer)
                <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->created_at}}</td>
                    <td>&nbsp;</td>
                    <td style="text-align: center">
                        <a class="btn btn-primary btn-sm" href="/admin/customers/view/{{$customer->id}}" style="width:30px">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#"
                            onclick="removeRow({{$customer->id}}, '/admin/customers/destroy')" style="width:30px">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div class="card-footer clear-fix">
        {!! $customers->links() !!}
    </div> --}}

@endsection
