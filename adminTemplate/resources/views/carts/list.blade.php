@extends('main')

@section('content')
    <form class="bg0 p-t-130 p-b-85" method="post">
        @include('admin.alert')

        @if (count($productts) != 0)
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="wrap-table-shopping-cart">
                                @php $total = 0;  
                                $content = Cart::content();
                                @endphp
                                <table class="table-shopping-cart">
                                    <tbody>
                                    <tr class="table_head">
                                        <th class="column-1">Sản Phẩm</th>
                                        <th class="column-2"></th>
                                        <th class="column-3">Giá</th>
                                        <th class="column-4">Số Lượng</th>
                                        <th class="column-5">Thành Tiền</th>
                                        <th class="column-6" style="width: 60px; text-align: center">Size</th>
                                        <th class="column-7" style="width: 60px; text-align: center">Màu</th>
                                        <th class="column-8" >&nbsp;</th>


                                    </tr>


                                    @foreach($content as $productt)
                                        @php
                                            $price=$productt->price;
                                            $priceEnd = $price * $productt->qty;
                                            $total += $priceEnd;
                                        @endphp
                                        <tr class="table_row">
                                            <td class="column-1">
                                                <div class="how-itemcart1">
                                                    <img src="{{$productt->options->image}}" alt="IMG">
                                                </div>
                                            </td>
                                            <td class="column-2">{{ $productt->name }}</td>
                                            <td class="column-3">{{$price}}</td>
                                            <td class="column-4">
                                                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>

                                                    <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                           name="num_product[{{ $productt->id }}]" value="{{ $productt->qty }}">

                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="column-5">{{$priceEnd}}</td>
                                            <input type="hidden" name="thanhtien" value="{{$priceEnd}}">
                                           
                                            <td class="column-6" style="width: 60px; text-align: center" >
                      
                                                {{-- <input type="hidden" name="mau" value="{{$size->id }}"> --}}
                                                <b>{{$productt->options->sizes}}</b>
                                               
                                               
                                            </td>
                                            <td class="column-7" style="width: 60px; text-align: center">
                                                {{-- <input type="hidden" name="size" value="{{$mau->id }}"> --}}
                                                <b>{{$productt->options->colors}}</b>
                                           </td>
                                            <td class="p-r-15">
                                                <input type="hidden" name="id_product" value="{{$productt->id }}">
                                                <a href="/carts/delete/{{ $productt->rowId}}">Xóa</a>
                                            </td>



                                          
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                                <div class="flex-w flex-m m-r-20 m-tb-5">
                                    <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                           name="coupon" placeholder="Mã Giảm Giá">

                                    <div
                                        class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                        Xác Nhận Mã
                                    </div>
                                </div>

                                <input type="submit" value="Cập Nhật Sản Phẩm" formaction="/update-cart"
                                    class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                @csrf
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                            <h4 class="mtext-109 cl2 p-b-30">
                                Tổng Tiền Trong Giỏ Hàng
                            </h4>

                            <div class="flex-w flex-t p-t-27 p-b-33">
                                <div class="size-208">
                                    <span class="mtext-101 cl2">
                                        Tổng Tiền:
                                    </span>
                                </div>

                                <div class="size-209 p-t-1">
                                    <span class="mtext-110 cl2">
                                        {{$total}}
                                    </span>
                                    <input type="hidden" name="tongtien" value="{{$total}}">
                                </div>
                            </div>

                            <div class="flex-w flex-t bor12 p-t-15 p-b-30">

                                <div class="size-100 p-r-18 p-r-0-sm w-full-ssm">

                                    <div class="p-t-15">
                                        <span class="stext-112 cl8">
                                            Thông Tin Người Mua
                                        </span>

                                        @if (Auth::check())
                                            <div class="bor8 bg0 m-b-12">
                                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name"
                                                id="input1" onkeypress="moveToNext(event, 'input2')" value="{{Auth::user()->name}}">
                                            </div>

                                            <div class="bor8 bg0 m-b-12">
                                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" title="Số điện thoại không đúng định dạng !"
                                                maxlength="11" pattern="(\+84|0)\d{9,10}" type="text" name="phone"  value="{{Auth::user()->phone}}"
                                                id="input2" onkeypress="moveToNext(event, 'input3')">
                                            </div>

                                            <div class="bor8 bg0 m-b-12">
                                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" value="{{Auth::user()->address}}"
                                                id="input3" onkeypress="moveToNext(event, 'input4')">
                                            </div>

                                            <div class="bor8 bg0 m-b-12">
                                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email" value="{{Auth::user()->email}}"
                                                id="input4" onkeypress="moveToNext(event, 'input5')">
                                            </div>
                                            <div class="bor8 bg0 m-b-12">
                                                <textarea class="cl8 plh3 size-111 p-lr-15" name="content" placeholder="Ghi Chú"
                                                id="input5" onkeypress="moveToNext(event, 'input1')"></textarea>                                        
                                            </div>
                                        @else
                                        
                                            <div class="bor8 bg0 m-b-12">
                                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" 
                                                id="input1" onkeypress="moveToNext(event, 'input2')" placeholder="Họ và Tên">
                                            </div>

                                            <div class="bor8 bg0 m-b-12">
                                                <input title="Số điện thoại không đúng định dạng !" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" maxlength="11" name="phone" pattern="(\+84|0)\d{9,10}"
                                                id="input2" onkeypress="moveToNext(event, 'input3')" placeholder="Số điện thoại">
                                            </div>
                                            
                                            <div class="bor8 bg0 m-b-12">
                                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" 
                                                id="input3" onkeypress="moveToNext(event, 'input4')" placeholder="Địa chỉ nhà">
                                            </div>

                                            <div class="bor8 bg0 m-b-12">
                                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email" 
                                                id="input4" onkeypress="moveToNext(event, 'input5')" placeholder="email">
                                            </div>

                                            @include('select.selectlist')

                                            <div class="bor8 bg0 m-b-12">
                                                <textarea class="cl8 plh3 size-111 p-lr-15" name="content" 
                                                id="input5" onkeypress="moveToNext(event, 'input1')" placeholder="Ghi Chú"></textarea>                                        
                                            </div>
                                        @endif               
                                    </div>
                                </div>
                            </div>

                            <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                               Đặt Hàng
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </form>

    @else
        <div class="text-center" style="padding: 50px;"><h2>Giỏ hàng trống</h2></div>
    @endif
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    {{-- Chuyen huong vao o tiep theo --}}
    <script>
        function moveToNext(event, nextInputId) {
          if (event.key === 'Enter') {
            event.preventDefault();
            document.getElementById(nextInputId).focus();
          }
        }
      </script>
@endsection
