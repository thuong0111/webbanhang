<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<center>
	<h1>Laravel Dynamic Drop Down with ajax</h1>

	<span>Tinh TP: </span>
	<select style="width: 200px" class="productcategory" id="prod_cat_id">

		<option value="0" disabled="true" selected="true">-Select-</option>
		@foreach($prod as $cat)
			<option value="{{$cat->id}}">{{$cat->ten}}</option>
		@endforeach

	</select>

	<span>Quan Huyen: </span>
	<select style="width: 200px" class="productname">

		<option value="0" disabled="true" selected="true">Quan Huyen</option>
	</select>
{{--
	<span>Product Price: </span>
	<input type="text" class="prod_price"> --}}
    <span>Phuong Xa: </span>
	<select style="width: 200px" class="phuongxa">

		<option value="0" disabled="true" selected="true">Phuong xa</option>
	</select>



</center>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('change','.productcategory',function(){
			console.log(" its change");

			var cat_id=$(this).val();
			var div=$(this).parent();

			var op=" ";

			$.ajax({
				type:'get',
				url:'{!!URL::to('findProductName')!!}',
				data:{'id':cat_id},
				success:function(data){
					//console.log('success');

					//console.log(data);

					//console.log(data.length);
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

		// $(document).on('change','.productname',function () {
		// 	var prod_id=$(this).val();

		// 	var a=$(this).parent();
		// 	console.log(prod_id);
		// 	var op="";
		// 	$.ajax({
		// 		type:'get',
		// 		url:'{!!URL::to('findPrice')!!}',
		// 		data:{'id':prod_id},
		// 		dataType:'json',//return data will be json
		// 		success:function(data){
		// 			console.log("price");
		// 			console.log(data.price);

		// 			// here price is coloumn name in products table data.coln name

		// 			a.find('.prod_price').val(data.price);

		// 		},
		// 		error:function(){

		// 		}
		// 	});


		// });

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

		// $(document).on('change','.productname',function () {
		// 	var prod_id=$(this).val();

		// 	var a=$(this).parent();
		// 	console.log(prod_id);
		// 	var op="";
		// 	$.ajax({
		// 		type:'get',
		// 		url:'{!!URL::to('findPrice')!!}',
		// 		data:{'id':prod_id},
		// 		dataType:'json',//return data will be json
		// 		success:function(data){
		// 			console.log("price");
		// 			console.log(data.price);

		// 			// here price is coloumn name in products table data.coln name

		// 			a.find('.prod_price').val(data.price);

		// 		},
		// 		error:function(){

		// 		}
		// 	});


		// });

	});
</script>

</body>
</html>
