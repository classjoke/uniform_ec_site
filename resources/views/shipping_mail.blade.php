{{ $data->user->name }} 様<br>
<br>
この度は、ご注文いただき誠にありがとうございます。<br>
本日、下記のご注文について発送を行いましたので、お知らせいたします。<br>
<br>
<br>
<br>
＜注文詳細＞<br>
注文番号: {{$data->id}}<br>
<br>
お届け先: {{ $data->user->name }} 様<br>
{{ $data->user->address }}<br>
<br>
品名: {{$data->uniform->name}}<br>
個数: {{$data->quantity}}<br>
合計: ￥ {{$data->uniform->price * $data->quantity}}<br>
<br>
<br>
<br>
<br>
<br>
またのご利用をお待ちしております。<br>
株式会社神田ユニフォーム