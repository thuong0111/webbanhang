{{-- @extends('main') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>

    <body >

        <!-- Header -->
        @include('header')

        <form class="bg0 p-t-130 p-b-85">
            {{-- @include('admin.alert') --}}
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                            <div class="m-l-25 m-r--38 m-lr-0-xl">
                                <div class="wrap-table-shopping-cart">
                                    <table class="table-shopping-cart">
                                        <tbody>
                                        <tr class="table_head">
                                            <th class="column-1">Sản Phẩm</th>
                                            <th class="column-2"></th>
                                            <th class="column-3">Giá</th>
                                            <th class="column-4">Số Lượng</th>
                                            <th class="column-5">Thành Tiền</th>
                                            <th class="column-6" style="width: 60px; text-align: center">Size</th>
                                            <th class="column-7" style="width: 60px; text-align: center">Mau</th>
                                            <th class="column-8" >&nbsp;</th>
                                        </tr>
                                        @foreach($htr as $key => $htrs)
    
                                            <tr class="table_row">
                                                <td class="column-1">
                                                    <div class="how-itemcart1">
                                                        <img src="{{$htrs->thumb}}" alt="IMG">
                                                    </div>
                                                </td>
                                                <td class="column-2">{{$htrs->name}}</td>
                                                <td class="column-3">{{$htrs->price}}</td>
                                                <td class="column-4">
                                                        <b>{{ $htrs->SL }}</b>
                                                </td>
                                                <td class="column-5">{{$htrs->thanhtien}}</td>
                                                
                                               
                                                <td class="column-6" style="width: 60px; text-align: center" >
                          
                                                    <b>{{$htrs->tensize}}</b>
                                                   
                                                   
                                                </td>
                                                <td class="column-7" style="width: 60px; text-align: center">
                                                    <b>{{$htrs->tenmau}}</b>
                                               </td>
                                                <td class="column-8" style="width: 60px; text-align: center">
                                                    <b>{{$htrs->id}}</b>
                                               </td>
                                                <td class="p-r-15">
                                                    {{-- <input type="hidden" name="id_product" value="{{$productt->id }}">
                                                    <a href="/carts/delete/{{ $productt->rowId}}">Xóa</a> --}}
                                                </td>       
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>

        <!-- Footer -->
        @include('footer')

    </body>
</html>
@section('content')
    <form class="bg0 p-t-130 p-b-85">
        {{-- @include('admin.alert') --}}
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="wrap-table-shopping-cart">
                                <table class="table-shopping-cart">
                                    <tbody>
                                    <tr class="table_head">
                                        <th class="column-1">Sản Phẩm</th>
                                        <th class="column-2"></th>
                                        <th class="column-3">Giá</th>
                                        <th class="column-4">Số Lượng</th>
                                        <th class="column-5">Thành Tiền</th>
                                        <th class="column-6" style="width: 60px; text-align: center">Size</th>
                                        <th class="column-7" style="width: 60px; text-align: center">Mau</th>
                                        <th class="column-8" >&nbsp;</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </form>

    {{-- @else
        <div class="text-center" style="padding: 50px;"><h2>Giỏ hàng trống</h2></div>
    @endif --}}

@endsection
