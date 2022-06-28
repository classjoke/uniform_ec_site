<!DOCTYPE html>
<html lang="jp">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{asset('style.css')}}">
	<title>OrderConfirm</title>
</head>

<body>
	<header>
		<h1>受注管理システム</h1>
		<hr class="main-hr">

		<div class="sub-header">
			<div class="links">
				<!-- links -->
			</div>

			<div class="page-name">注文完了画面</div>

			<div class="earnings">
				@isset($data['auth'])
				<div class="logout">
					<a href="{{route('logout')}}">ログアウト</a>
				</div>
				@else
				<div class="logout">
					<a href="{{route('logout')}}">トップページに戻る</a>
				</div>
				@endisset
			</div>

		</div>
		<hr class="sub-hr">
    </header>

	<main>	

		<div class="order-compleate-message">
			<div>
				{{$data['name']}}様
				下記の商品の注文が完了いたしました。
			</div>

			<div>{{$data['email']}} 宛てに振込先メールを送信いたしました。</div>

			<div>ご利用、ありがとうございました。</div>
		</div>

		<table class="main-table">
			<tr>
				<th>氏名</th>
				<th>メールアドレス</th>
				<th>種類</th>
				<th>個数</th>
				<th>合計金額</th>
				<th>発注日</th>
			</tr>
			<tr>
				<td>{{$data['name']}}</td>
				<td>{{$data['email']}}</td>
				<td>{{$data['uniform_name']}}</td>
				<td>{{$data['quantity']}}</td>
				<td>\ {{$data['total_price']}}</td>
				<td>{{$data['order_date']}}</td>
			</tr>
		</table>
		<div class="redirect-link"><a href="{{route('order.form')}}">注文画面へもどる</a></div>
	</main>

	<footer>

	</footer>

</body>

</html>