<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>admin-login</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

<form action="{{url('admin/testupload')}}" method="post" enctype="multipart/form-data" id="login-form">
    {{csrf_field()}}
    <input type="text" class="form-control" name="title">
    <input type="file" class="form-control" name="photos" id="file" />
    <button type="submit" class="btn btn-primary btn-lg">上传</button>
</form>
</body>
<script src="/js/app.js"></script>
@include('flash::message')
</html>