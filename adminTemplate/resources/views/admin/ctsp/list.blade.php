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
                {{-- <th style="width: 50px">&nbsp;</th> --}}
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
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    
    
@endsection