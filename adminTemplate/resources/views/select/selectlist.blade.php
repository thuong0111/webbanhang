
<div>
	<select style="width: 100%; height: 40px;" class="thanhpho" id="prod_cat_id" name="city">
		<option value="0" disabled="true" selected="true"> --Thanh Pho--</option>
		@foreach($prod as $cat)
			<option value="{{$cat->id}}">{{$cat->tenTP}}</option>
		@endforeach
	</select>
	<br>
	<br>
	<select style="width: 100%; height: 40px;" class="quanhuyen" name = "district">
		<option value="0" disabled="true" selected="true"> --Quan Huyen--</option>
		@foreach($prod as $cat)
			<option value="{{$cat->id}}">{{$cat->tenQH}}</option>
		@endforeach
	</select>
	<br>
	<br>
	<select style="width: 100%; height: 40px;" class="phuongxa" name="ward">
		<option value="0" disabled="true" selected="true">  --Phuong Xa--</option>
	</select>
	<br>
	<br>
</div>

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
					op+='<option value="'+data[i].id+'">'+data[i].tenQH+'</option>';
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
						op+='<option value="'+data[i].id+'">'+data[i].tenPX+'</option>';
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

