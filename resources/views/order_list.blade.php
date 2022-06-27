<!DOCTYPE html>
<html lang="jp">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('style.css') }}">
	<title>OrderList</title>
</head>

<body>
	<header>
		<h1>受注管理システム</h1>
		<hr class="admin-hr">

		<div class="sub-header">
			<div class="links">
				<a href="/uniformRegister">商品登録</a>　　
				商品削除:
				<select name="uniform" id="uniform">
					@foreach ($uniformList as $uniform)
						<option value="{{$uniform->id}}">{{$uniform->name}}</option>
					@endforeach
				</select>
				<button class="btn-danger">削除</button>
			</div>

			<div class="page-name">受注管理一覧</div>

			<div class="earnings">
				
				<button type="button" id="visualization" onclick="visualization()">
					削除済み商品の注文を表示
				</button>

				<a href="{{route('logout')}}">ログアウト</a>
			</div>
		</div>
		<hr class="sub-hr">
	</header>

	<main>
		<table class="main-table">
			<tr>
				<th class="no">No</th>
				<th class="name">氏名</th>
				<th class="type">種類</th>
				<th class="quantity">個数</th>
				<th class="total-amount">合計金額</th>
				<th class="order-date">発注日</th>
				<th class="payment-status">入金状況</th>
				<th class="shipping-status">発送状況</th>
				<th class="detail-link">リンク</th>
			</tr>
            @foreach ($orderList as $orderInfo)
					<tr 
						@isset ($orderInfo->uniform->deleted_at)
							style="display:none" 
							class="deleted"
						@endisset
					>
						<td>{{$orderInfo->id}}</td>
						<td>{{$orderInfo->user->name}}</td>
						<td>{{$orderInfo->uniform->name}}</td>
						<td>{{$orderInfo->quantity}}</td>
						<td>\{{$orderInfo->quantity * $orderInfo->uniform->price}}</td>
						<td>{{$orderInfo->order_date}}</td>
						<td>
							@if ($orderInfo->payment_status == 0)
								未入金
							@else
								入金済み
							@endisset
						</td>
						<td>
							@if ($orderInfo->shipping_status == 0)
								未発送
							@else
								発送済み
							@endisset	
						</td>
						<td><a href="{{route('order.detail')}}?id={{$orderInfo->id}}">詳細</a></td>
					</tr>
            @endforeach
		</table>
	</main>
	<footer>
	</footer>

</body>
<script>
	const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
	const deletebutton = document.querySelectorAll('.btn-danger');
	const selectBox = document.getElementById('uniform');
	deletebutton.forEach(eachbutton => {
		eachbutton.addEventListener('click', () => {
			const selected =  selectBox.options[selectBox.selectedIndex]
			const uniformName =selected.text;
			const uniform_id = selected.value;
			
			const delete_flag = confirm(uniformName + 'を本当に削除しますか？');
			if(delete_flag) {
				selected.remove();
				submit(uniform_id);
			}
		})
	});

	// ajax 送信関数

	let submit = async (uniform_id) => {
		const res = await fetch("{{route('uniform.delete')}}", {
			method : 'POST',
			headers : {
				"X-CSRF-Token": csrfToken,
				"Content-Type": 'application/x-www-form-urlencoded'
			},
			body : "id="+uniform_id
		});
		console.log('削除成功');
		document.location.reload()
	}

	function visualization (){
		const button = document.getElementById('visualization');
		const deleted = document.getElementsByClassName('deleted');
		if(deleted[0].style.display == "none") {
			for( i = 0 ; i < deleted.length ; i++){
				deleted[i].style.display = 'table-row';
			}
			button.textContent = "削除済み商品の注文を非表示";
		}else{
			for( i = 0 ; i < deleted.length ; i++){
				deleted[i].style.display = 'none';
			}
			button.textContent = "削除済み商品の注文を表示";
		}


	}
</script>
</html>