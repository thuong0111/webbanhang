
	<select style="width: 343px; height: 40px;text-align:center;margin-top: 15px;margin-left: 12px;" class="thanhpho" id="prod_cat_id" name="city">
		<option value="0" disabled="true" selected="true"> --Thanh Pho--</option>
		@foreach($prod as $cat)
			<option value="{{$cat->id}}">{{$cat->tentp}}</option>
		@endforeach
	</select>
	<select style="width: 343px; height: 40px;margin-top: 15px;text-align:center;margin-left: 21px;" class="quanhuyen" name = "district" id="quanhuyen">
		<option value="0" disabled="true" selected="true"> --Quan Huyen--</option>
		@foreach($prod as $cat)
			<option value="{{$cat->id}}">{{$cat->tenqh}}</option>
		@endforeach
	</select>
	
	<select style="width: 343px;margin-left: 191px; height: 40px;margin-top: 15px;text-align: center" class="phuongxa" name="ward" id="phuongxa">
		<option value="0" disabled="true" selected="true">  --Phuong Xa--</option>
	</select>
	
	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('change','.thanhpho',function(){
			var cat_id=$(this).val();
			var div=$(this).parent();
			var op=" ";
			$.ajax({
				type:'get',
				url:'{!!URL::to('findProductName')!!}',
				data:{'id':cat_id},
				success:function(data){
					op+='<option value="0" selected disabled> Chose Quan Huyen</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].tenqh+'</option>';
				   }
				   div.find('.quanhuyen').html(" ");
				   div.find('.quanhuyen').append(op);
				},
				error:function(){
				}
			});
		});

	});
</script>

<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('change','.quanhuyen',function(){
			console.log(" its change");

			var cat_id=$(this).val();
			var div=$(this).parent();

			var op=" ";

			$.ajax({
				type:'get',
				url:'{!!URL::to('findPhuongXa')!!}',
				data:{'id':cat_id},
				success:function(data){
					//console.log('success');

					//console.log(data);

					//console.log(data.length);
					op+='<option value="0" selected disabled> chose Phuong Xa</option>';
					for(var i=0;i<data.length;i++){
						op+='<option value="'+data[i].id+'">'+data[i].tenpx+'</option>';
				   }

				   div.find('.phuongxa').html(" ");
				   div.find('.phuongxa').append(op);
				},
				error:function(){

				}
			});
		});
	});
</script>
{{-- <script type="text/javascript">
	$(document).ready(function(){
	$(document).on('change','#prod_cat_id',function(){
		let e = document.getElementById("prod_cat_id");
		let giaTri = e.options[e.selectedIndex].text;
        document.getElementById('tp').setAttribute('value', giaTri);
});
});
</script>
<script type="text/javascript">
	$(document).ready(function(){
	$(document).on('change','#quanhuyen',function(){
		let e = document.getElementById("quanhuyen");
		let giaTri = e.options[e.selectedIndex].text;
        document.getElementById('tp').setAttribute('value', giaTri);
});
});
</script>
<script type="text/javascript">
	$(document).ready(function(){
	$(document).on('change','#phuongxa',function(){
		let e = document.getElementById("phuongxa");
		let giaTri = e.options[e.selectedIndex].text;
        document.getElementById('tp').setAttribute('value', giaTri);
});
});
</script> --}}


<script type="text/javascript">
	$(document).ready(function(){
		let dl,dl1,dl2,dl3;
	$(document).on('change','#prod_cat_id',function(){
		let e = document.getElementById("prod_cat_id");
		let giaTriTp = e.options[e.selectedIndex].text;
		dl=giaTriTp;
	$(document).on('change','#quanhuyen',function(){
		let a = document.getElementById("quanhuyen");
		let giaTriQh = a.options[a.selectedIndex].text;
		dl+=', '+giaTriQh;
	$(document).on('change','#phuongxa',function(){
		let x = document.getElementById("phuongxa");
		let giaTriPx = x.options[x.selectedIndex].text;
		dl+=', '+giaTriPx; 
	document.getElementById('address').setAttribute('value', dl);
});
});
});
});
</script>

