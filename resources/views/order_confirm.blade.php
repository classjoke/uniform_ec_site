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
		<div style="display: flex; align-items: center;">
			<img style="margin: 20px; display:block;" width="20%" height="20%" src='{{asset("mainpic.jpeg")}}'>
			<h1 style="margin-left: 17%;">ユニフォーム着ようぜ！！</h1>
		</div>
		<hr class="main-hr">

		<div class="sub-header">
			<div class="links">
				<!-- links -->
			</div>

			<div class="page-name">注文完了</div>
			<div class="earnings">
			</div>

		</div>
		<hr class="sub-hr">
    </header>

	<main>	
		<div class="order-compleate-message">
			<div class="order-name">
				{{$data['name']}}様
				下記の商品の注文が完了いたしました！
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
		<div style="text-align: center; padding: 15px 30px;">
			<div class="logout">
			@isset($data['auth'])
				<a class="btn-square-so-pop" href="{{route('logout')}}">ログアウト</a>
			@else
				<a class="btn-square-so-pop" href="{{route('logout')}}">トップページに戻る</a>
			@endisset
			<a class="btn-square-so-pop" href="{{route('order.form')}}">注文画面へもどる</a>
			</div>
		</div>
		</div>
	</main>

	<footer>

	</footer>

</body>

</html>