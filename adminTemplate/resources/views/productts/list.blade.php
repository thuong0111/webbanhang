<div class="row isotope-grid">
    @foreach($productts as $key => $productt)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2">
                @csrf
                <div class="block2-pic hov-img0">
                    <img src="{{ $productt->thumb }}" alt="{{ $productt->name }}">
                </div>
                {{-- <input type="hidden" class="product-id" value="{{$productt->id}}"> --}}
                {{-- <button value="{{$productt->id}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                    Quick view
                </button> --}}
                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="/san-pham/{{ $productt->id }}-{{ Str::slug($productt->name, '-') }}.html"
                           class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            {{ $productt->name }}
                        </a>

                        <span class="stext-105 cl3">
							{!! \App\Helpers\Helper::price($productt->price, $productt->price_sale) !!}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
     
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(function($){
        $(".block2-btn").on('click', function(){
           var obj = $(this).val();

          $.ajax({
            url: "/api/quickviewAPI",
                method: "GET",
                dataType: "JSON",
                data: {"data":obj},
            success:function(data){
               
            }
          }).then(res => {
            console.log(res)

            $.each(res, function(key, val){
                 console.log(val.thumb);
                let name = document.getElementById("name-product").innerHTML = val.name;
                let price_sale = document.getElementById("pricesale-product").innerHTML = val.price_sale;
                let content = document.getElementById("content-product").innerHTML = val.content;
                let img = document.getElementById("img-product").src = val.thumb;
            });
          });
        });
    });
</script>
