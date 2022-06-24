
<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <title>orderDetail</title>
</head>

<body>
    <header>
        <h1>受注管理システム</h1>
        <hr class="admin-hr">

        <div class="sub-header">
            <div class="links">
                <!-- links -->
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
                <td>1</td>
            </tr>
            <tr>
                <th>名前</th>
                <td>田中太郎</td>
            </tr>
            <tr>
                <th>住所</th>
                <td>東京都 ○○</td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td class="email-detail">example@example.com</td>
            </tr>
            <tr>
                <th>商品種類</th>
                <td>ユニフォーム１</td>
            </tr>
            <tr>
                <th>購入個数</th>
                <td>2個</td>
            </tr>
            <tr>
                <th>注文日時</th>
                <td>2022/06/20</td>
            </tr>
            <tr>
                <th>入金状況</th>
                <td class="status">
                    <div id="payment-status">未</div>
                    <div id="payment-btn"><button type="button" onclick="clickPayBtn()">入金済みにする</button></div>
                </td>
            </tr>
            <tr>
                <th>発送状況</th>
                <td class="status">
                    <div id="shipping-status">未</div>
                    <div id="shipping-btn"><button type="button" onclick="clickShipBtn()">発送済みとする</button></div>
                </td>
            </tr>
        </table>

        <div class="order-detail-message">
            <div>備考</div>
            <p>25日以降の発送だと嬉しいです。</p>
        </div>
    </main>
    <footer>

    </footer>
</body>

<script>
    function clickShipBtn() {
        let shipStatus = document.getElementById('shipping-status');

        shipStatus.textContent = "発送済み";
        document.getElementById('shipping-btn').style.display = "none";
    }

    function clickPayBtn() {
        let payStatus = document.getElementById('payment-status');

        payStatus.textContent = "入金済み";
        document.getElementById('payment-btn').style.display = "none";
    }
</script>

</html>
