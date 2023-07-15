@extends('main')

@section('content')
       
    <div class="div-head" style="padding-top: 165px">
    </div>

    {{-- @if(session()->has('message'))
    <div class="alert alert-success">
        {!!session()->get('message')!!}
    </div>
    @elseif(session()->has('error'))
    <div class="alert alert-danger">
        {!!session()->get('error')!!}
    </div>
    @endif --}}
    {{-- p-d-85 --}}
    <form class="bg0 p-b-0 p-t-0" method="post">
        @include('admin.alert')

        @if (count($productts) != 0)
            <div class="container" >
                <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50" style="position: inherit;">
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
                                        <th class="column-8" >&nbsp;</th>
                                    </tr>
                                    @foreach($content as $productt)
                                        @php
                                            $priceEnd = 0;
                                            $price=$productt->price;
                                            $priceEnd = $price * $productt->qty;
                                            $total += $priceEnd;
                                        @endphp
                                        <tr class="table_row">
                                            <td class="column-1">
                                                <div class="how-itemcart1">
                                                    <a href="/san-pham/{{ $productt->id }}-{{ Str::slug($productt->name, '-') }}.html" style="position: absolute;margin-top:-22px"> <img src="{{$productt->options->image}}" alt="IMG"></a>
                                                </div>
                                            </td>
                                            <td class="column-2">{{ $productt->name }}</td>
                                            <td class="column-3">{{ number_format($price, '0', '', '.') }}</td>
                                            <td class="column-4">
                                                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>

                                                    <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                        min="1" name="num_product[{{ $productt->rowId }}]" id="slhang" value="{{ $productt->qty }}">

                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" >
                                                        <i class="fs-16 zmdi zmdi-plus" id="slupdate"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="column-5">{{ number_format($priceEnd, '0', '', '.') }}</td>
                                            <input type="hidden" name="thanhtien" value="{{$priceEnd}}">
                                           
                                            <td class="column-6" style="width: 60px; text-align: center" >
                                                <input type="hidden" name="sizessss" value="{{$sizesss}}">
                                                <b>{{$productt->options->sizes}}</b>                                  
                                            </td>
                                            <td class="column-7" style="width: 60px; text-align: center">
                                                <input type="hidden" name="maussss" value="{{$mausss}}">
                                                <b>{{$productt->options->colors}}</b>
                                           </td>
                                            <td class="p-r-15" style="width:59px; text-align: center;">
                                                
                                                <input type="hidden" id="layid_product" name="id_product[{{$productt->id }}]" value="{{$productt->id }}">
                                                <a href="/carts/delete/{{ $productt->rowId}}"><i class="fas fa-trash" style="font-size: 20px; color:red;"></i></a>
                                                <input type="hidden" value="{{$productt->rowId}}" name="rowId_cart[{{$productt->id }}{{ $productt->options->sizes }}{{ $productt->options->colors }}]" id="rowid" class="form control">
                                            </td>
                                            {{-- <td style="width:78px"> --}}
                                                {{-- <a href="/update-cart-quantity/{{ $productt->qty }}/{{$productt->rowId}}" id="href" style="border: 1px solid #000;border-radius: 20px;color: #333;background-color: #f3f3f3;">Cập Nhật</a> --}}                               
                                                {{-- <input type="hidden" name="slcart" id="slupdatecart" value="">                                                 --}}
                                            {{-- </td> --}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                                <div class="flex-w flex-m m-r-20 m-tb-5">
                                    <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Mã Giảm Giá">

                                    <button formaction="/check-coupon" name="check-coupon" type="submit"
                                        class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                        Xác Nhận Mã
                                    </button>
                                </div>

                                <input type="submit" value="Cập Nhật Sản Phẩm" formaction="/update-cart-quantity" method="post" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                @csrf
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                        <div class="bor10 p-lr-40 p-t-20 p-b-30 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                            <h4 class="mtext-109 cl2 p-b-15">
                                Tổng Tiền Trong Giỏ Hàng
                            </h4>

                            <div class="flex-w flex-t p-t-1 p-b-1">
                                <div class="size-208">
                                    <span class="mtext-101 cl2">
                                        Tổng Tiền:
                                    </span> 
                                </div>

                                <div class="size-209 p-t-1">
                                    <span class="mtext-110 cl2">
                                        {{ number_format($total, '0', '', '.') }}
                                    </span>
                                    <input type="hidden" name="tongtien" value="{{$total}}">
                                </div>
                            </div>

                            <li>
                                @if(Session::get('coupon'))
                                    @foreach(Session::get('coupon') as $key => $cou)
                                        @if($cou['tngg']==1)
                                        Mã giảm : {{$cou['sotiengg']}} %
                                        <p>
                                            @php
                                            $total_coupon = ($total * $cou['sotiengg'])/100;
                                            echo '<p><li>Tổng giảm:'.number_format($total_coupon,0,',','.').' VND</li></p>';
                                            @endphp
                                            <input type="hidden" name="tiengg" value="{{$total_coupon}}">

                                        </p>
                                        <p>
                                            @php
                                               $totalend=$total-$total_coupon;
                                            @endphp
                                            <li>Tổng đã giảm :{{number_format($totalend,0,',','.')}} VND </li>
                                            <input type="hidden" name="tientra" value="{{$totalend}}">
    


                                        </p>
                                        @elseif($cou['tngg']==2)
                                            Mã giảm : {{number_format($cou['sotiengg'],0,',','.')}} VND
                                            <p>
                                                
                                               @php
                                               $total_coupon=$cou['sotiengg'];
                                                $totalend = $total - $cou['sotiengg'];
                                                @endphp
                                                <input type="hidden" name="tiengg" value="{{$total_coupon}}">
                                            </p>
                                            <p><li>Số tiền cần phải thanh toán:{{ number_format($totalend,0,',','.')}} VND</li></p>
                                            <input type="hidden" name="tientra" value="{{$totalend}}">

                                        @endif
                                    @endforeach
                                @endif
                            </li>

                            <div class="flex-w flex-t bor12 p-t-0 p-t-0">

                                <div class="size-100 p-r-18 p-r-0-sm w-full-ssm">

                                    <div class="p-t-15">
                                        <span class="stext-112 cl8" style="font-weight: bold;">
                                            Thông Tin Người Mua
                                        </span>

                                        @if (Auth::check())
                                            <div class="bor8 bg0 m-b-5">
                                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name"
                                                id="input1" onkeypress="moveToNext(event, 'input2')" value="{{Auth::user()->name}}">
                                            </div>

                                            <div class="bor8 bg0 m-b-5">
                                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" title="Số điện thoại không đúng định dạng !"
                                                maxlength="11" pattern="(\+84|0)\d{9,10}" type="text" name="phone"  value="{{Auth::user()->phone}}"
                                                id="input2" onkeypress="moveToNext(event, 'input3')">
                                            </div>

                                            <div class="bor8 bg0 m-b-5">
                                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" value="{{Auth::user()->address}}"
                                                id="input3" onkeypress="moveToNext(event, 'input4')">
                                            </div>

                                            <div class="bor8 bg0 m-b-5">
                                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email" value="{{Auth::user()->email}}"
                                                id="input4" onkeypress="moveToNext(event, 'input5')">
                                            </div>
                                            <div class="bor8 bg0 m-b-5">
                                                <textarea class="cl8 plh3 size-111 p-lr-15 textarea" name="content" placeholder="Ghi Chú"
                                                id="input5" onkeypress="moveToNext(event, 'input1')"></textarea>
                                                <input type="hidden" name="pttt" value="1">                                          
                                                <input type="hidden" name="dstt" value="1">
                                                @if(Session::get('coupon')==false)
                                                <input type="hidden" name="tiengg" value="0"> 
                                                <input type="hidden" name="tientra" value="{{$total}}">  
                                                @endif                                         
                                            </div>
                                        @else
                                        
                                            <div class="bor8 bg0 m-b-5">
                                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" 
                                                id="input1" onkeypress="moveToNext(event, 'input2')" placeholder="Họ và Tên">
                                            </div>

                                            <div class="bor8 bg0 m-b-5">
                                                <input title="Số điện thoại không đúng định dạng !" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" maxlength="11" name="phone" pattern="(\+84|0)\d{9,10}"
                                                id="input2" onkeypress="moveToNext(event, 'input3')" placeholder="Số điện thoại">
                                            </div>
                                            
                                            <div class="bor8 bg0 m-b-5">
                                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" 
                                                id="input3" onkeypress="moveToNext(event, 'input4')" placeholder="Địa chỉ nhà">
                                            </div>

                                            <div class="bor8 bg0 m-b-5">
                                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email" 
                                                id="input4" onkeypress="moveToNext(event, 'input5')" placeholder="email">
                                            </div>
                                            <input type="hidden" name="pttt" value="1">                                          
                                            <input type="hidden" name="dstt" value="1">    

                                            @include('select.selectlist')

                                            <div class="bor8 bg0 m-b-5">
                                                <textarea class="cl8 plh3 size-111 p-lr-15 textarea" name="content" 
                                                id="input5" onkeypress="moveToNext(event, 'input1')" placeholder="Ghi Chú"></textarea>                               
                                            </div>
                                        @endif               
                                    </div>
                                </div>
                            </div>

                            <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                               Thanh Toán Khi Nhận Hàng
                            </button>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    
            @if(Auth::check())
                <form action="{{ url('/vnpay') }}" method="POST" style="position: absolute; margin: -110px 0 0 857px; width: 310px;">
                    @csrf
                    <input type="hidden" name="thanhtienvnpay" value="{{$priceEnd}}">
                    <input type="hidden" name="tongtienvnpay" value="{{$total}}">
                    <input type="hidden" name="namevnpay" value="{{Auth::user()->name}}">
                    <input type="hidden" name="phonevnpay"  value="{{Auth::user()->phone}}">
                    <input type="hidden" name="addressvnpay" value="{{Auth::user()->address}}">
                    <input type="hidden" name="emailvnpay" value="{{Auth::user()->email}}">
                    <input type="hidden" name="contentvnpay" id="textarealay" value=""> 
                    <input type="hidden" name="ptttvnpay" value="2"> 
                    <input type="hidden" name="dsttvnpay" value="1"> 
                    @if(Session::get('coupon'))
                    <input type="hidden" name="tiengg" value="{{ $total_coupon }}"> 
                    <input type="hidden" name="tientra" value="{{$totalend}}"> 
                    @else
                    <input type="hidden" name="tiengg" value="0"> 
                    <input type="hidden" name="tientra" value="{{$total}}"> 
                    @endif
                    <input type="hidden" name="sizevnpay" id="sizevnpay" value="{{ $sizesss }}"> 
                    <input type="hidden" name="mauvnpay" id="mauvnpay" value="{{ $mausss }}"> 
                    <button type="submit" name="redirect" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Thanh Toán VNPay
                    </button>
                </form>   
            {{-- @else
                <form action="{{ url('/vnpay') }}" method="POST" style="position: absolute; margin: -210px 0 0 857px; width: 310px;">
                    @csrf
                    
                    <input type="hidden" id="inputname" name="namevnpay">
                    <input type="hidden" id="inputphone" name="phonevnpay">
                    <input type="hidden" id="inputaddress" name="addressvnpay">
                    <input type="hidden" id="inputemail" name="emailvnpay">
                    <input type="hidden" id="tinh" name="cityvnpay">
                    <input type="hidden" id="huyen" name="quanhuyenvnpay">
                    <input type="hidden" id="xa" name="phuongxavnpay">
                    <input type="hidden" id="inputcontent" name="contentvnpay">

                    
                    <input type="hidden" name="sizevnpay" id="sizevnpay" value="{{ $sizesss }}"> 
                    <input type="hidden" name="mauvnpay" id="mauvnpay" value="{{ $mausss }}"> 
                    <button type="submit" name="redirect" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Thanh Toan VNPay
                    </button>
                </form> --}}
            @endif
    @else
        <div class="text-center" style="padding: 10px 0 0 0;"><h2>Giỏ hàng trống</h2></div>
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

{{-- vnpay_login --}}
<script type="text/javascript">
    $(document).ready(function(){
	$(document).on('change','.textarea',function(){
		let e = document.getElementById("input5").value;
	document.getElementById('textarealay').setAttribute('value', e);
	});});
</script>

{{-- vnpay_nologin --}}
<script type="text/javascript">
    $(document).ready(function(){
	$(document).on('change','#input1',function(){
		let e = document.getElementById("input1").value;
	document.getElementById('inputname').setAttribute('value', e);
	});});
</script>

<script type="text/javascript">
    $(document).ready(function(){
	$(document).on('change','#input2',function(){
		let e = document.getElementById("input2").value;
	document.getElementById('inputphone').setAttribute('value', e);
	});});
</script>

<script type="text/javascript">
    $(document).ready(function(){
	$(document).on('change','#input3',function(){
		let e = document.getElementById("input3").value;
	document.getElementById('inputaddress').setAttribute('value', e);
	});});
</script>

<script type="text/javascript">
    $(document).ready(function(){
	$(document).on('change','#input4',function(){
		let e = document.getElementById("input4").value;
	document.getElementById('inputemail').setAttribute('value', e);
	});});
</script>

<script type="text/javascript">
    $(document).ready(function(){
	$(document).on('change','#input5',function(){
		let e = document.getElementById("input5").value;
	document.getElementById('inputcontent').setAttribute('value', e);
	});});
</script>

<script type="text/javascript">
	$(document).ready(function(){
	$(document).on('change','#prod_cat_id',function(){
		let e = document.getElementById("prod_cat_id");
		let giaTri = e.options[e.selectedIndex].value;
        console.log(giaTri)
	document.getElementById('tinh').setAttribute('value', giaTri);
	});
});
</script>
<script type="text/javascript">
	$(document).ready(function(){
	$(document).on('change','#quanhuyen',function(){
		let e = document.getElementById("quanhuyen");
		let giaTriSize = e.options[e.selectedIndex].value;
	document.getElementById('huyen').setAttribute('value', giaTriSize);
	});
});
</script>
<script type="text/javascript">
	$(document).ready(function(){
	$(document).on('change','#phuongxa',function(){
		let e = document.getElementById("phuongxa");
		let giaTriSize = e.options[e.selectedIndex].value;
	document.getElementById('xa').setAttribute('value', giaTriSize);
	});
});
</script>
@endsection