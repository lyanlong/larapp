<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>admin-login</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

<form action="{{url('admin/login')}}" method="post" id="login-form">
    {{csrf_field()}}
    <input type="text" class="form-control" name="username">
    <input type="password" class="form-control" name="password">
    <button class="btn btn-primary btn-lg">login√</button>
</form>
</body>
<script src="/js/app.js"></script>
@include('flash::message')
</html>