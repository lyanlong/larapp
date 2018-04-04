@extends('admin.layouts.master1')
@section('content')
    <form action="" method="post" class="form-horizontal" role="form">
        {{csrf_field()}}
        <div class="form-group">
            <legend>密码修改</legend>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">原密码</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="ori_password">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">新密码</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="password">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">确认密码</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="password_confirmation">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary">确认修改</button>
            </div>
        </div>
    </form>
@endsection