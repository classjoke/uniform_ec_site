<!DOCTYPE html>
<html lang="jp">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('style.css') }}">
	<title>UniformList</title>
</head>

<body>
	<header>
		<h1>受注管理システム</h1>
		<hr class="admin-hr">

		<div class="sub-header">
			<div class="links">
				<a href="{{ route('uniform.insert') }}">商品登録</a>　　
				<a href="{{ route('order.list') }}">受注管理一覧</a>　　
				商品削除:
				<select name="uniform" id="uniform">
					@foreach ($uniformList as $uniform)
						@continue($uniform->deleted_at)
						<option value="{{$uniform->id}}">{{$uniform->name}}</option>
					@endforeach
				</select>
				<button class="btn-danger">削除</button>
			</div>

			<div class="page-name">商品一覧</div>

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
				<th class="image">イメージ</th>
				<th class="name">商品名</th>
				<th class="type">価格</th>
				<th class="quantity">在庫数</th>
				<th class="edit"></th>
			</tr>
            @foreach ($uniformList as $uniform)
					<tr 
						@isset ($uniform->deleted_at)
							style="display:none" 
							class="deleted"
						@endisset
						id="uniform_data_{{$uniform->id}}"
					>
						<td>{{$uniform->id}}</td>
						<td>
							@isset ($uniform->image_path)
            				<img width="100" src='{{asset("uploads/" . $uniform->image_path)}}'>
            				@endisset
						</td>
						<td>{{$uniform->name}}</td>
						<td>\{{$uniform->price}}</td>
						<td>{{$uniform->stock}}</td>
						<td>
							<button type="button" onclick="toggle_edit({{$uniform->id}})">
								編集
							</button>
						</td>
					</tr>
					<tr
						style="display:none"
						class="uniform_forms"
						id="uniform_form_{{$uniform->id}}"
					>
						<form action='{{route("uniform.update")}}' method="post">
							@csrf
							<td>{{$uniform->id}}</td>
							<td>
								@isset ($uniform->image_path)
            					<img width="100" height="100" src='{{asset("uploads/" . $uniform->image_path)}}'>
            					@endisset
							</td>
							<input type="hidden" name="uniform_id" value="{{$uniform->id}}">
    						<td><input type="text" name="uniform_name" value="{{$uniform->name}}"></td>
    						<td>\<input type="text" name="uniform_price" value="{{$uniform->price}}"></td>
    						<td><input type="text" name="uniform_stock" value="{{$uniform->stock}}"></td>
    						<td class="edit_button">
    							<input type="submit" value="確定">
    						</td>
						</form>
					</tr>
            @endforeach
		</table>
	</main>
	<footer>
		{{-- <img src="{{ asset('/uploads/データ抽出_1.png') }}"> --}}
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
		const uniform_forms = document.getElementsByClassName('uniform_forms');
		for(let i=0; i < uniform_forms.length; i++){
			console.log(uniform_forms[i]);
			uniform_forms[i].style.display = 'none';
		}
		
	}

	// 在庫編集
	
	function toggle_edit(uniform_id){
		const uniform_data = document.getElementById('uniform_data_'+uniform_id);
		const uniform_form = document.getElementById('uniform_form_'+uniform_id);
		const visualization_button = document.getElementById('visualization');
		uniform_data.style.display = "none";
		uniform_form.style.display = "table-row";
		visualization_button.style.display = "none";
	}
</script>
</html>