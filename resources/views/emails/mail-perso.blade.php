<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$mailData['subject']}}</title>
</head>
<body>
    <h2>{{$mailData['sender']}}, gestionnaire de Pictum, vous a envoyé un message :</h2>
    <p>{{$mailData['content']}}</p>
</body>
</html>
