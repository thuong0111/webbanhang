@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Name Product</th>
                <th>Category</th>
                <th>Price</th>
                <th>Price Sale</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 50px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productts as $key =>$productt)
                <tr>
                    <td>{{$productt->id}}</td>
                    <td>{{$productt->name}}</td>
                    <td>{{$productt->menu->name}}</td>
                    <td>{{$productt->price}}</td>
                    <td>{{$productt->price_sale}}</td>
                    <td>{!! \App\Helpers\Helper::active($productt->active) !!}</td>
                    <td>{{$productt->updated_at}}</td>
                    <td>&nbsp;</td>
                    <td style="text-align: center;">
                        <a class="btn btn-primary btn-sm" href="/admin/productts/edit/{{$productt->id}}" style="width:30px">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" 
                            onclick="removeRow({{$productt->id}}, '/admin/productts/destroy')" style="width:30px">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-footer clear-fix">
        {!! $productts->links() !!}
    </div>
    
@endsection