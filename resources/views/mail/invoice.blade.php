<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Template</title>
</head>
<body>
    <ul>
        <li>Payment ID: {{ $data['payment_id'] }}</li>
        <li>Total Amount: {{ $data['total'] }}</li>
        <li>Payment Type: {{ $data['payment_type'] }}</li>
        <li>Status Code: {{ $data['status_code'] }}</li>
    </ul>
</body>
</html>
