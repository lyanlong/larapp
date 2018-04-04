@extends('admin.layouts.master1')
@section('content')
    <ul class="nav nav-tabs">
        <li role="presentation"><a href="{{url('admin/tag')}}">标签列表</a></li>
        <li role="presentation"><a href="{{url('admin/tag/create')}}">添加标签</a></li>
        <li role="presentation" class="active"><a href="#">编辑标签</a></li>
    </ul>
    <div class="admin-content">
        <form action="{{url("admin/tag/$data->id")}}" method="post" class="form-horizontal" role="form">
            {{csrf_field()}}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">标签标号</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="id" value="{{$data->id}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">标签作者</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" value="{{$data->author}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">标签名</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" value="{{$data->name}}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button class="btn btn-primary" type="submit">确认修改</button>
                </div>
            </div>
        </form>
    </div>
@endsection