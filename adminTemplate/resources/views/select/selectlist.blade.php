

<div>
	<select style="width: 200px" class="productcategory" id="prod_cat_id">
		<option value="0" disabled="true" selected="true">-Select-</option>
		@foreach($prod as $cat)
			<option value="{{$cat->id}}">{{$cat->ten}}</option>
		@endforeach
	</select><br>

	<select style="width: 200px" class="productname">
		<option value="0" disabled="true" selected="true">Quan Huyen</option>
	</select><br>

	<select style="width: 200px" class="phuongxa">
		<option value="0" disabled="true" selected="true">Phuong xa</option>
	</select>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('change','.productcategory',function(){
			var cat_id=$(this).val();
			var div=$(this).parent();
			var op=" ";
			$.ajax({
				type:'get',
				url:'{!!URL::to('findProductName')!!}',
				data:{'id':cat_id},
				success:function(data){
					op+='<option value="0" selected disabled>chose product</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
				   }
				   div.find('.productname').html(" ");
				   div.find('.productname').append(op);
				},
				error:function(){
				}
			});
		});

	});
</script>

<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('change','.productname',function(){
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
					op+='<option value="0" selected disabled>chose product</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].ten+'</option>';
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

