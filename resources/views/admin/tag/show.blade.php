@extends('admin.layouts.master1')
@section('content')
    <ul class="nav nav-tabs">
        <li role="presentation"><a href="{{url('admin/tag')}}">标签列表</a></li>
        <li role="presentation" class="active"><a href="{{url('admin/tag/create')}}">添加标签</a></li>
        <li role="presentation"><a href="#">编辑标签</a></li>
    </ul>
    <div class="admin-content">
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">标签名</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" value="{{$data->name}}">
            </div>
        </div>
    </div>
@endsection