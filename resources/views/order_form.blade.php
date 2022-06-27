<!DOCTYPE html>
<html lang="jp">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{asset('style.css')}}">
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
				@if ($name !== "")
				<div class="logout">
					<a href="{{route('logout')}}">ログアウト</a>
				</div>			
				@endif
			</div>
		</div>
		<hr class="sub-hr">
	</header>
	<main>
		<form action="{{route('order.form')}}" method="post">
		@csrf
		<table class="order-form">
				<tr>
					<th>名前</th>
					<td><input name="name" type="text" value="{{$name}}"></td>
				</tr>
				<tr>
					<th>mail</th>
					<td><input name="email" type="email" value="{{$email}}"></td>
				</tr>
				<tr>
					<th>住所</th>
					<td><input name="address" type="text" value="{{$address}}"></td>
				</tr>
				<tr>
					<th>商品</th>
					<td>
						<select name="uniform_id">
							<option value="1">ユニフォームA</option>
							<option value="2">ユニフォームB</option>
							<option value="3">ユニフォームC</option>
							<option value="4">ユニフォームD</option>
							<option value="5">ユニフォームE</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>個数</th>
					<td><input name="quantity" type="number" min=1></td>
				</tr>
				<tr>
					<th>備考欄</th>
					<td><input name="remarks_column" type="text"></td>
				</tr>
				<tr>
					<td colspan="2" class="submit-button"><input type="submit" value="購入"></td>
				</tr>
		</table>
		</form>
	</main>
	<footer>

	</footer>
</body>

</html>