<!DOCTYPE html>
<html lang="jp">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{asset('style.css')}}">
	<title>Login</title>
</head>

<body>
	<header>
		<h1>ユニフォーム着ようぜ！！</h1>

		<div class="sub-header">
			<div class="links">
				<!-- links -->
			</div>

			<div class="earnings">
				<!--  -->
			</div>
		</div>
	</header>
	<main>
		<div style="text-align: center; margin-bottom: 30px;">
			<img width="80%" height="50%" src='{{asset("mainpic.jpeg")}}'>
		</div> 

		<div class="page-name">ログイン</div>
	
		<form action="{{route('login')}}" method="post">
    		@csrf
    		<table class="order-form">
    			<tr>
    				{{-- <th>ユーザーID</th> --}}
    				<td><input name="login_id" type="text" required="required" value="{{ old('login_id')}}" placeholder="ユーザーID"></td>
    			</tr>
    			<tr>
    				{{-- <th>パスワード</th> --}}
    				<td><input name="password" type="password" required="required" value="{{ old('password')}}" placeholder="パスワード"></td>
    			</tr>
    			<tr>
    				<td colspan="2" class="submit-button">
    					<input class="btn-square-so-pop" type="submit" value="ログイン">
    				</td>
    			</tr>
    		</table>
		</form>
		
		@if(session('error'))
			<div class="password-missed" role="alert" style="display:block">
				{{ session('error') }}
			</div>
		@endif

        <div style="text-align: center; padding-top: 30px;">
			<a class="btn-square-so-pop" href="{{route('order.form')}}">ゲストとして注文する</a>
		    <a class="btn-square-so-pop" href="{{route('user.register')}}">新規登録を行う</a>
        </div>
		
		
	</main>
	<footer>
	</footer>
</body>

</html>
