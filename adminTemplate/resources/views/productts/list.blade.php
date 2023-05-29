<div class="row isotope-grid">
    @foreach($productts as $key => $productt)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2">
                @csrf
                <div class="block2-pic hov-img0">
                    <img src="{{ $productt->thumb }}" alt="{{ $productt->name }}" height="390px">
                </div>
                {{-- <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                    Quick view
                </a> --}}
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
                    {{-- <input type="button" data-toggle="modal" data-target="#quickview" value="Quick View"
                    class="btn btn-default quickview" data-id="{{$productt->id}}"> --}}
                </div>
            </div>
        </div>
    @endforeach
      {{-- <!-- Modal -->
      <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title quickview_title" id="">

                <span id="quickview_title"></span>
                Modal

            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            ...
            </div>
            <div class="row">
                <div class="col-md-5">
                    ID: <span id="quickview_id"></span>
                </div>
                <div class="col-md-7">

                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.quickview').click(function(){
            var id = $(this).data('id');
            var token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/quickview')}}",
                method: "POST",
                dataType: "JSON",
                data: {id:id, _token:_token},
                success: function(data){
                    $('#quickview_title').html(data.name);
                    $('#quickview_id').html(data.id);
                }
            })
        })
    </script> --}}
</div>
