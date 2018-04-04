@extends('admin.layouts.master1')
@section('content')
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="{{url('admin/tag')}}">标签列表</a></li>
        <li role="presentation"><a href="{{url('admin/tag/create')}}">添加标签</a></li>
        <li role="presentation"><a href="#">编辑标签</a></li>
    </ul>

    <div class="admin-content table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>标签编号</th>
                <th>标签名</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $da)
                <tr>
                    <td>{{$da->id}}</td>
                    <td>{{$da->name}}</td>
                    <td>
                        <a href="javascript:;" class="admin-tag-del" data-id="{{$da->id}}">删除</a>
                        <a href={{url("admin/tag/$da->id/edit/")}}>编辑</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="admin-tag-del-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">larapp后台-删除标签</h4>
                </div>
                <div class="admin-tag-del-modal-msg">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        $(function () {
            $('.admin-tag-del').bind('click', function () {
                if(confirm('确定删除该标签？')){
                    $.ajax({
                        type: "DELETE",
                        url: "/admin/tag/" + $(this).attr('data-id'),
                        success: function (response) {
                            var response = JSON.parse(response);
                            $('.admin-tag-del-modal-msg').html(response.msg);
                            $('#admin-tag-del-modal').modal();
                        }
                    });
                }
            });
            $("#admin-tag-del-modal").on("hidden.bs.modal",function(){
                window.location.reload();
            });
        });
    </script>
@endsection