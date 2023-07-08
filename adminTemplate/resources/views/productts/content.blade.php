@extends('main')
@section('content')
    <div class="container p-t-80">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg" style="padding: 90px 0 0 0;">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Trang Chủ
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="/danh-muc/{{ $productt->menu->id }}-{{ Str::slug($productt->menu->name) }}-{{ Str::slug($productt->menu->price) }}.html"
               class="stext-109 cl8 hov-cl1 trans-04">
                {{ $productt->menu->name }}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
				{{ $title }}
			</span>
        </div>
    </div>

    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots">
                                <ul class="slick3-dots" style="" role="tablist">
                                    <li class="slick-active" role="presentation">
                                        <img src="{{ $productt->thumb }}">
                                        <div class="slick3-dot-overlay"></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w">
                                <button class="arrow-slick3 prev-slick3 slick-arrow" style=""><i
                                        class="fa fa-angle-left" aria-hidden="true"></i></button>
                                <button class="arrow-slick3 next-slick3 slick-arrow" style=""><i
                                        class="fa fa-angle-right" aria-hidden="true"></i></button>
                            </div>

                            <div class="slick3 gallery-lb slick-initialized slick-slider slick-dotted">
                                <div class="slick-list draggable">
                                    <div class="slick-track" style="opacity: 1; width: 1539px;">
                                        <div class="item-slick3 slick-slide slick-current slick-active"
                                             data-thumb="images/product-detail-01.jpg" data-slick-index="0"
                                             aria-hidden="false"
                                             style="width: 513px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;"
                                             tabindex="0" role="tabpanel" id="slick-slide10"
                                             aria-describedby="slick-slide-control10">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="{{ $productt->thumb }}" alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                   href="images/product-detail-01.jpg" tabindex="0">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">

                        @include('admin.alert')

                        <h1 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $title }}
                        </h1>

                        <span class="mtext-106 cl2">
							{!! \App\Helpers\Helper::price($productt->price, $productt->price_sale) !!}
						</span>

                        <p class="stext-102 cl3 p-t-23">
                            {{ $productt->description }}
                        </p>

                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">
                                Size
                            </div>

                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2 chonsizedc" name="time" id="sizes">
                                        <option value="0" disabled="true" selected="true"> --Chọn Size--</option>
                                        @foreach($sizes as $size)
                                        @for ($i=0; $i < count($size); $i++)
                                        <option value="{{$size[$i]->id}}">{{$size[$i]->tensize}}</option>
                                        @endfor
                                        @endforeach
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">
                                Màu
                            </div>

                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2 chonmaudc" name="time" id="maus">
                                        <option value="0" disabled="true" selected="true"> --Chọn Màu--</option>
                                        @foreach($maus as $mau)
                                        @for ($i=0; $i < count($mau); $i++)
                                        <option value="{{$mau[$i]->id}}">{{$mau[$i]->tenmau}}</option>
                                        @endfor
                                        @endforeach
                                    </select>
                                    
                                    <div class="dropDownSelect2"></div>
                                </div>
                                
                            </div>
                        </div>

                        <!--  -->
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <form action="/add-cart" method="post">
                                        @if ($productt->price !== NULL)
                                            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>
                                                <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                       name="num_product" value="1">

                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>


                                            <button type="submit"
                                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 " id="add-to-cart">
                                                Thêm Vào Giỏ
                                            </button>
                                            <input type="hidden" id="idproduct" name="product_id" value="{{ $productt->id }}">
                                            <input type="hidden" id="size_s" name="size_id"value="">
                                            <input type="hidden" id="mau_s" name="mau_id" value="">

                                        @endif
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- four-icon -->
                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                            <div class="flex-m bor9 p-r-10 m-r-11">
                                <a href="#"
                                   class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                   data-tooltip="Add to Wishlist">
                                    <i class="zmdi zmdi-favorite"></i>
                                </a>
                            </div>

                            <a href="https://www.facebook.com" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                               data-tooltip="Facebook">
                                <i class="social fab fa-facebook-square"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                               data-tooltip="Twitter">
                                <i class="social fab fa-twitter"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                               data-tooltip="Google Plus">
                                <i class="social fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Mô Tả</a>
                        </li>

                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#information" role="tab">Thông Tin Chi Tiết</a>
                        </li>

                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Đánh Giá (1)</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- Description -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 cl6">
                                    {!! $productt->content !!}
                                </p>
                            </div>
                        </div>

                        <!-- Additional information -->
                        <div class="tab-pane fade" id="information" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    <ul class="p-lr-28 p-lr-15-sm">
                                        <li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Weight
											</span>

                                            <span class="stext-102 cl6 size-206">
												0.79 kg
											</span>
                                        </li>

                                        <li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Dimensions
											</span>

                                            <span class="stext-102 cl6 size-206">
												110 x 33 x 100 cm
											</span>
                                        </li>

                                        <li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Materials
											</span>

                                            <span class="stext-102 cl6 size-206">
												60% cotton
											</span>
                                        </li>

                                        <li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Color
											</span>

                                            <span class="stext-102 cl6 size-206">
												Black, Blue, Grey, Green, Red, White
											</span>
                                        </li>

                                        <li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Size
											</span>

                                            <span class="stext-102 cl6 size-206">
												XL, L, M, S
											</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews (1) -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    <div class="p-b-30 m-lr-15-sm">
                                        <!-- Review -->
                                        <h5>Tất Cả Nhận Xét</h5>
                                        <br>
                                        <form>
                                            @csrf
                                            <input type="hidden" name="comment_product" class="comment_product" value="{{$productt->id}}">
                                            <div id="show_comment"></div>
                                        </form>

                                        <!-- Add review -->
                                        <form action="#">
                                            <h3 class="mtext-108 cl2 p-b-7">
                                                Thêm nhận xét
                                            </h3>

                                            {{-- <div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Số Sao
												</span>

                                                <span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="rating">
												</span>
                                            </div> --}}

                                            <div class="row p-b-25">
                                                <div class="col-sm-6 p-b-5">
                                                    {{-- <label>Tên</label> --}}
                                                    <input class="comment_name" type="text" placeholder="Tên của bạn">
                                                </div>
                                                <div class="col-12 p-b-5">
                                                    {{-- <label>Nhận xét của bạn</label> --}}
                                                    <textarea class="comment_ct" name="comment" style="height: 125px; width:100%;" 
                                                    placeholder="Nhận xét của bạn"></textarea>
                                                </div>
                                            </div>
                                            <div id="err_cm"></div>
                                            <button type="button" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10 send-comment">
                                                Gửi nhận xét
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">

            <span class="stext-107 cl6 p-lr-25">
				Loại Sản Phẩm: {{ $productt->menu->name }}
			</span>
        </div>
    </section>

    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Sản Phẩm Liên Quan
                </h3>
                @foreach ($related as $relate)
                <div class="block2">
                    @csrf
                    <div class="block2-pic hov-img0">
                        <img src="{{ $relate->thumb }}" alt="{{ $relate->name }}" height="390px">
                    </div>
                    {{-- <input type="hidden" class="product-id" value="{{$productt->id}}"> --}}
                    <button value="{{$relate->id}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                        Xem Nhanh
                    </button>
                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/san-pham/{{ $relate->id }}-{{ Str::slug($relate->name, '-') }}.html"
                               class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{ $relate->name }}
                            </a>
    
                            <span class="stext-105 cl3">
                                {!! \App\Helpers\Helper::price($relate->price, $relate->price_sale) !!}
                            </span>
                        </div>
                        
                    </div>
                </div>
                @endforeach
            </div>

            @include('productts.list')
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{-- <script type="text/javascript">
	$(document).ready(function(){
		$(document).on('change','.js-select2',function(){
			var cat_id=$(this).val();
			var div=$(this).parent();
			var op=" ";
			$.ajax({
				type:'get',
				url:'{!!URL::to('findSize')!!}',
				data:{'id':cat_id},
				success:function(data){
					op+='<option value="0" selected disabled> Chose Size</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].tenmau+'</option>';
				   }
				   div.find('.mau').html(" ");
				   div.find('.mau').append(op);
				},
				error:function(){
				}
			});
		});

	});
</script> --}}
<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('change','.chonsizedc',function(){
            var idpro=document.getElementById("idproduct").value;
			var size_id=$(this).val();
			var div=$(".chonmaudc").parent();
			var op=" ";
           
			$.ajax({
				type:'get',
				url:'{!!URL::to('findmau')!!}',
				data:{'id':size_id,'idpro':idpro},
				success:function(data){
                    op+='<option value="0" selected disabled> Chọn Màu</option>';
					for(var i=0;i<data.length;i++){
                        op+='<option value="'+data[i].id+'">'+data[i].tenmau+'</option>';
				   }
                   console.log(op);
				   div.find('.chonmaudc').html(" ");
                   console.log(div.find('.chonmaudc').html(" "));
				   div.find('.chonmaudc').append(op);
				},
				error:function(){
				}
			});
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
        load_comment();
        // alert(product_id);
        function load_comment(){
            var product_id = $('.comment_product').val();
            var _token = $('.input[name="_token"]').val();
            $.ajax({
				url:"{{url('/load-comment')}}",
                method:"POST",
				data:{product_id:product_id, _token:_token},
				success:function(data){
                    $('#show_comment').html(data);
				},
			});
        }
        $('.send-comment').click(function(){
            var product_id = $('.comment_product').val();
            var comment_name = $('.comment_name').val();
            var comment_ct = $('.comment_ct').val();
            var _token = $('.input[name="_token"]').val();
            $.ajax({
				url:"{{url('/send-comment')}}",
                method:"POST",
				data:{product_id:product_id, comment_name:comment_name, comment_ct:comment_ct, _token:_token},
				success:function(data){
                    $('#err_cm').html('<p class="text text-success">Thêm Bình Luận Thành Công</p>');
                    load_comment();
                    $('#err_cm').fadeOut(2000);
                    $('.comment_name').val('');
                    $('.comment_ct').val('');
				}
			});
        });
	});
</script>


<script type="text/javascript">
	$(document).ready(function(){
	$(document).on('change','#sizes',function(){
		let e = document.getElementById("sizes");
		let giaTriSize = e.options[e.selectedIndex].value;
	document.getElementById('size_s').setAttribute('value', giaTriSize);
	});
});
</script>
<script type="text/javascript">
	$(document).ready(function(){
	$(document).on('change','#maus',function(){
		let b = document.getElementById("maus");
		let giaTriMau = b.options[b.selectedIndex].value;
	document.getElementById('mau_s').setAttribute('value', giaTriMau);
	});
});
</script>
{{-- <script type="text/javascript">
	$(document).ready(function(){
	$(document).on('click','#add-to-cart',function(){
		swal({
            title: "Thêm giỏ hàng thành công !",
            icon: "success",
            button: "Đi tới giỏ hàng",
    });
	});
});
</script> --}}

@endsection