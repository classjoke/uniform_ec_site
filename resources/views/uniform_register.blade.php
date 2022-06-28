<!DOCTYPE html>
<html lang="jp">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('style.css')}}">
	<title>UniformResister</title>
</head>

<body>
	<header>
		<h1>ユニフォーム着ようぜ！！</h1>
		<hr class="admin-hr">

		<div class="sub-header">
			<div class="links">
				<!-- links -->
			</div>

			<div class="page-name">ユニフォーム登録</div>

			<div class="earnings"></div>
		</div>
		<hr class="sub-hr">
	</header>
	<main>
		<!-- order-formのcssを流用(仮) -->
		<table class="order-form">
			<form action="{{ route('uniform.insert') }}" method=post enctype="multipart/form-data">
			@csrf
				<tr>
					{{-- <th>ユニフォーム名</th> --}}
					<td><input name="name" type="text" required="required" placeholder="ユニフォーム名"></td>
				</tr>
				<tr>
					{{-- <th>価格</th> --}}
					<td><input name="price" type="number" min=1 required="required" placeholder="価格"></td>
				</tr>
				<tr>
					{{-- <th>在庫</th> --}}
					<td><input name="stock" type="number" min=1 required="required" placeholder="在庫"></td>
				</tr>
				<tr>
					{{-- <th>画像</th> --}}
					<td><input name="image" type="file" placeholder="画像"></td>
				</tr>
				<tr>
					<td colspan="2" class="submit-button">
						<input type="submit" class="btn-square-so-pop" value="登録">
					</td>
				</tr>
			</form>
		</table>
		@isset($request)
			{{$request}}
		@endisset
	</main>
	<footer>

	</footer>
</body>

</html>