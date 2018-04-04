@extends('admin.layouts.master1')
@section('content')
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="{{url('admin/video')}}">视频列表</a></li>
        <li role="presentation"><a href="{{url('admin/video/create')}}">添加视频</a></li>
        <li role="presentation"><a href="#">编辑视频</a></li>
    </ul>

    <div class="admin-content table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>视频编号</th>
                <th>标题</th>
                <th>描述</th>
                <th>时长</th>
                <th>作者</th>
                <th>上传者</th>
                <th>发布时间</th>
                <th>状态</th>
                <th>点击数</th>
                <th>分类</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $da)
                <tr>
                    <td>{{$da->id}}</td>
                    <td>{{$da->name}}</td>
                    <td>
                        <a href="javascript:;" class="admin-video-del" data-id="{{$da->id}}">删除</a>
                        <a href={{url("admin/video/$da->id/edit/")}}>编辑</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="admin-video-del-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">larapp后台-删除视频</h4>
                </div>
                <div class="admin-video-del-modal-msg">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        $(function () {
            $('.admin-video-del').bind('click', function () {
                if(confirm('确定删除该视频？')){
                    $.ajax({
                        type: "DELETE",
                        url: "/admin/video/" + $(this).attr('data-id'),
                        success: function (response) {
                            var response = JSON.parse(response);
                            $('.admin-video-del-modal-msg').html(response.msg);
                            $('#admin-video-del-modal').modal();
                        }
                    });
                }
            });
            $("#admin-video-del-modal").on("hidden.bs.modal",function(){
                window.location.reload();
            });
        });
    </script>
@endsection