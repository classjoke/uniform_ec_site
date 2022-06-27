
<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <title>orderDetail</title>
</head>

<body>
    <header>
        <h1>受注管理システム</h1>
        <hr class="admin-hr">

        <div class="sub-header">
            <div class="links">
                <a href="{{route('order.list')}}">注文管理</a>
            </div>

            <div class="page-name">注文詳細</div>

            <div class="earnings">
                <!--  -->
            </div>
        </div>
        <hr class="sub-hr">
    </header>
    <main>
        <!-- 購入者情報 -->
        <table class="main-table">
            <tr>
                <th>No.</th>
                <td>{{$orderDetail->id}}</td>
            </tr>
            <tr>
                <th>名前</th>
                <td>{{$orderDetail->user->name}}</td>
            </tr>
            <tr>
                <th>住所</th>
                <td>{{$orderDetail->user->address}}</td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td class="email-detail">{{$orderDetail->user->email}}</td>
            </tr>
            <tr>
                <th>商品種類</th>
                <td>{{$orderDetail->uniform->name}}</td>
            </tr>
            <tr>
                <th>購入個数</th>
                <td>{{$orderDetail->quantity}}</td>
            </tr>
            <tr>
                <th>注文日時</th>
                <td>{{$orderDetail->order_date}}</td>
            </tr>
            <tr>
                <th>入金状況</th>
                <td class="status">
                    <div id="payment-status">
                        @if($orderDetail->payment_status == 0)
                            未入金
                            <div id="payment-btn"><button type="button" onclick="clickPayBtn()">入金済みにする</button></div>
                        @elseif($orderDetail->payment_status == 1)
                            入金済み
                        @endif
                    </div>
                </td>
            </tr>
            <tr>
                <th>発送状況</th>
                <td class="status">
                    <div id="shipping-status">
                        @if($orderDetail->shipping_status == 0)
                            未発送
                            <div id="shipping-btn"><button type="button" onclick="clickShipBtn()">発送済みにする</button></div>
                        @elseif($orderDetail->shipping_status == 1)
                            入金済み
                        @endif
                    </div>
                </td>
            </tr>
        </table>

        <div class="order-detail-message">
            <div>備考</div>
            <p>{{$orderDetail->remarks_column}}</p>
        </div>
    </main>
    <footer>

    </footer>
</body>

<script>
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

    function clickPayBtn() {
        let payStatus = document.getElementById('payment-status');
        if(confirm('入金済みメールを送信します、よろしいですか？')){
            payStatus.textContent = "入金済み";
            sendPaymentMail({{ $orderDetail->id }});
        }
    }

    let sendPaymentMail = async (orderId) => {
        const res = await fetch("{{route('update.status.payment')}}", {
            method : 'POST',
			headers : {
				"X-CSRF-Token": csrfToken,
				"Content-Type": 'application/x-www-form-urlencoded'
			},
			body : "id="+orderId
        })
    }

    function clickShipBtn() {
        let shipStatus = document.getElementById('shipping-status');
        if(confirm('発送済みメールを送信します、よろしいですか？')){
            shipStatus.textContent = "発送済み";
            sendShippingMail({{ $orderDetail->id }});
        }
    }

    let sendShippingMail = async (orderId) => {
        const res = await fetch("{{route('update.status.shipping')}}", {
            method : 'POST',
			headers : {
				"X-CSRF-Token": csrfToken,
				"Content-Type": 'application/x-www-form-urlencoded'
			},
			body : "id="+orderId
        })
    }
</script>

</html>
