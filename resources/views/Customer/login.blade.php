<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('customer.login')}}" method="post">
    @csrf
    deer@gmail.com
    <input type="text" name="email" placeholder="Email">
    Password
    <input type="text" name="password" placeholder="Password">

    <button type="submit"> Login </button>
</form>
</body>
</html>
