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
        <h1>受注管理システム</h1>
        <hr class="main-hr">

        <div class="sub-header">
            <div class="links">
                <!-- links -->
            </div>

            <div class="page-name">一般ユーザー登録登録</div>

            <div class="earnings">

            </div>
        </div>
        <hr class="sub-hr">
    </header>
    <main>
    	<form action="{{ route('user.register') }}" method="post">
        	<table class="order-form">
                @csrf
                <tr>
                    <th>氏名</th>
                    <td><input name="name" type="text" required="required"></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td><input name="email" type="email" required="required"></td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td><input name="password" type="password" required="required"></td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td><input name="address" type="text" required="required"></td>
                </tr>
                <tr>
                    <th>ログインID</th>
                    <td><input name="login_id" type="text" required="required"></td>
                </tr>
                <tr>
                    <td colspan="2" class="submit-button"><input type="submit" value="登録"></td>
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

</html>
