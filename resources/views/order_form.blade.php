<!DOCTYPE html>
<html lang="jp">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{asset('style.css')}}">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<title>OrderForm</title>
</head>

<body>
	<header>
		<h1>受注管理システム</h1>
		<hr class="main-hr">

		<div class="sub-header">
			<div class="links">
				
			</div>

			<div class="page-name">注文画面</div>

			<div class="earnings">
				@isset($user)
				<div class="logout">
					<a href="{{route('logout')}}">ログアウト</a>
				</div>			
				@endisset
			</div>
		</div>
		<hr class="sub-hr">
	</header>
	<main>
		<div class="container">
			@foreach ($uniformList as $uniform)
				@isset ($uniform->image_path)
				<div class="item">
					<img width="200" height="200" src='{{asset("uploads/" . $uniform->image_path)}}'>
					<p>{{$uniform->name}}</p>
				</div>
				@endisset
			@endforeach
		</div>

		<form action="{{route('order.form')}}" method="post" style="margin-bottom: 10%;">
		@csrf
		<table class="order-form">
				<tr>
					<th>名前</th>
					<td><input name="name" type="text" value="{{@$user->name}}" required="required"></td>
				</tr>
				<tr>
					<th>mail</th>
					<td><input name="email" type="email" value="{{@$user->email}}" required="required"></td>
				</tr>
				<tr>
					<th>住所</th>
					<td><input name="address" type="text" value="{{@$user->address}}" required="required"></td>
				</tr>
				<tr>
					<th>商品</th>
					<td>
						<select name="uniform_id" id="uniforms">
							@foreach($uniformList as $uniform)
								<option value="{{$uniform->id}}">{{$uniform->name}}</option>
							@endforeach
						</select>
					</td>
				</tr>
				<tr>
					<th>個数</th>
					<td>
						@if (count($uniformList) !== 0)
							<input @if($uniformList[0]->stock <= 0) style="display:none" @endif id="quantity" name="quantity" type="number" min=1 max={{$uniformList[0]->stock}} required="required">
							<div class="soldOut" id="soldOut" @if($uniformList[0]->stock > 0) style="display:none" @endif>SOLD OUT!!</div>
						@else
							ユニフォームが存在しないため個数選択不可
						@endif
					</td>
				</tr>
				<tr>
					<th>備考欄</th>
					<td><input name="remarks_column" type="text"></td>
				</tr>
				<tr>
					<td colspan="2" class="submit-button"><input id="submitBtn" type="submit" value="購入" @if(count($uniformList) == 0 || $uniformList[0]->stock <= 0) disabled @endif></td>
				</tr>
		</table>
		</form>
		@if(session('error'))
			<div class="password-missed" role="alert" style="display:block">
				{{ session('error') }}
			</div>
		@endif
	</main>
	<footer>
		
	</footer>
</body>

<script>
	const stocks = @json($uniformList);
	$('#uniforms').change(function() {
		let selected = $('option:selected');
		let uniform_id = selected.val();
		let index = selected.index();

		let stock = stocks[index].stock;
		let quantity = document.getElementById('quantity');
		if(stock <= 0){
			quantity.style.display ="none";
			document.getElementById('soldOut').style.display = "inline-block";
			$('#submitBtn').prop('disabled', true);

		}else {
			quantity.style.display ="inline-block";
			document.getElementById('soldOut').style.display = "none";
			$('#submitBtn').prop('disabled', false);
			quantity.max = stock;
			quantity.value = 1;
		}

	})
</script>
</html>