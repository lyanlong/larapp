@extends('admin.layouts.master1')
@section('content')
    <ul class="nav nav-tabs">
        <li role="presentation"><a href="{{url('admin/video')}}">视频列表</a></li>
        <li role="presentation" class="active"><a href="{{url('admin/video/create')}}">添加视频</a></li>
        <li role="presentation"><a href="#">编辑视频</a></li>
    </ul>
    
    <div id="admin-video-create" class="admin-content">
        <form action="{{url('admin/video')}}" method="post" class="form-horizontal" role="form">
            {{csrf_field()}}
            <div v-for="(v,k) in lists">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">视频名</label>
                    <div class="col-sm-8">
                        <input type="text" :value="v.title">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">作者</label>
                    <div class="col-sm-8">
                        <input type="text" :value="v.author">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">描述</label>
                    <div class="col-sm-8">
                        <textarea :value="v.author"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">文件</label>
                    <div class="col-sm-8">
                        <input type="text" :value="v.author">
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" v-on:click.prevent="del(k)">删除</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <button class="btn btn-primary" v-on:click.prevent="add">添加</button>
                    <button type="submit" class="btn btn-primary">确认提交</button>
                </div>
            </div>
        </form>
        <div>
            @{{lists}}
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#admin-video-create',
            data:{
                lists: [
                    {title:'a',author:'b',desc:'c',path:'d',publish_time:'e',tag_id:'f'}
                ],
            },
            methods:{
                add: function(){
                    this.lists.push({title:'a',author:'b',desc:'c',path:'d',publish_time:'e',tag_id:'f'});
                },
                del: function(index){
                    this.lists.splice(index, 1);
                }
            }
        });
    </script>
@endsection