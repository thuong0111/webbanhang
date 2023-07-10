@extends('admin.main')

@section('content')
    <div class="row w3-res-tb">
        <div class="col-sm-3" style="display: flex">
        <form action="/tim-kiem-product" method="POST">
            {{ csrf_field() }}
            <div class="input-group" style="display: flex; padding: 5px 0 5px 0;">
            <input type="text" name="keywords_submit" class="input-sm form-control" placeholder="Enter Category">
            <input type="submit" name="search_items" style="color:#000;margin-top: 0"class="btn btn-primary btn-sm" value="Tìm kiếm"/>
            </div>
        </form>
        <a class="btn btn-primary btn-sm" href="/admin/productts/add" style="width:30px;height: 36px;
        margin-top: 5px;
        margin-left: 20px;">
            <span class="icon" title="Add Product"><i class="fas fa-plus"></i></span>
        </a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên sản phẩm</th>
                <th>Loại sản phẩm</th>
                {{-- <th>Quantity</th> --}}
                <th>Giá</th>
                <th>Giá giảm</th>
                <th>Trạng thái</th>
                <th>Thời gian</th>
                <th style="width: 50px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productts as $key =>$productt)
                <tr>
                    <td>{{$productt->id}}</td>
                    <td>{{$productt->name}}</td>
                    <td>{{$productt->menu->name}}</td>
                    {{-- <td>{{$productt->SL}}</td> --}}
                    <td>{{$productt->price}}</td>
                    <td>{{$productt->price_sale}}</td>
                    <td>{!! \App\Helpers\Helper::active($productt->active) !!}</td>
                    <td>{{$productt->updated_at}}</td>
                    
                    <td style="text-align: center; display:flex">
                        
                        <a class="btn btn-primary btn-sm" href="/admin/productts/edit/{{$productt->id}}" style="width:30px; margin:0 2px 0 2px;">
                            <span class="icon" title="Edit Product"><i class="fas fa-edit"></i></span>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" 
                            onclick="removeRow({{$productt->id}}, '/admin/productts/destroy')" style="width:30px">
                            <span class="icon" title="Delete Product"><i class="fas fa-trash"></i></span>
                        </a>
                    </td>
                    <td>&nbsp;</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-footer clear-fix">
        {!! $productts->links() !!}
    </div>
    
@endsection