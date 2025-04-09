<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Email</title>
</head>
<body>
    <h2>Welcome to {{config('app.name')}}</h2>
    <p>Please verify your email by clicking the link below:</p>
    <a href="{{url('/verify-email/' . $token)}}">Verify Email</a>
</body>
</html>