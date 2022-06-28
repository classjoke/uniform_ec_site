<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <title>UserRegister</title>
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
        
        {{-- <hr class="sub-hr"> --}}
       
    </header>
    <main>
        <div style="text-align: center; margin-bottom: 30px;  max-width: 800px; margin:0 auto;">
			<img width="80%" height="50%" src='{{asset("mainpic.jpeg")}}'>
		</div>

        <div class="page-name">一般ユーザー登録</div>

    	<form action="{{ route('user.register') }}" method="post">
        	<table class="order-form">
                @csrf
                <tr>
                    <td><input name="name" type="text" required="required" placeholder="氏名"></td>
                </tr>
                <tr>
                    <td><input name="email" type="email" required="required" placeholder="メールアドレス"></td>
                </tr>
                <tr>
                    <td><input name="password" type="password" required="required" placeholder="パスワード"></td>
                </tr>
                <tr>
                    <td><input name="address" type="text" required="required" placeholder="住所"></td>
                </tr>
                <tr>
                    <td><input name="login_id" type="text" required="required" placeholder="ログインID"></td>
                </tr>
                <tr>
                    <td colspan="2" class="submit-button"><input class="btn-square-so-pop" type="submit" value="登録"></td>
                </tr>
        	</table>
        </form>
        @if(session('error'))
			<div class="password-missed" role="alert" style="display:block">
				{{ session('error') }}
			</div>
		@endif
        <div style="text-align: center;">
            <div class="logout">
                <a class="btn-square-so-pop" href="{{route('logout')}}">トップページに戻る</a>
            </div>					
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>
