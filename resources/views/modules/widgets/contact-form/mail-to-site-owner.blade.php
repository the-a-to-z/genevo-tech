<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Genevo Technology</title>
</head>
<body>

<div style="width: 100%; font-family: Verdana, Arial, sans-serif; font-size: 14px; background: #ffffff;">
    <div style="height: 60px; background: #ec6719;width: 100%; ">
        <div style="color: #fff; text-align: center; font-size: 26px; line-height: 50px;">
            Genevo Technology
        </div>
    </div>

    <div style="max-width: 600px; margin: 0 auto; padding: 50px 30px 80px; background: #f0f0f0;">
        <p>Dear Sir/Madam,</p>
        <p>&nbsp;</p>

        <p>You have received an inbox from a visitor. </p>

        <p>Email: {{ $data['email'] }}</p>
        <p>Name: {{ $data['name'] }}</p>
        <p>Message: {!! $data['message'] !!}</p>

    </div>

    <div style="background: #ec6719; height: 40px; width: 100%;">
        <p>&nbsp;</p>
    </div>
</div>


</body>
</html>