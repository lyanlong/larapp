<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Tag;
use Auth;

class TagController extends CommonController
{
    /**
     * Display a listing of the resource.
     * GET
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Tag::get();
        return view('admin.tag.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * GET
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     * POST
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Tag();
        $model->name = $request->name;
        $model->author = Auth::guard('admin')->user()->username;
        if($model->save()){
            flash()->overlay('添加成功', '后台添加标签');
        }else{
            flash()->overlay('添加失败', '后台添加标签');
        }
        return redirect('admin/tag');
    }

    /**
     * Display the specified resource.
     * GET
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Tag::find($id);
        return view('admin.tag.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     * GET
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Tag::find($id);
        return view('admin.tag.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * PUT/PATCH
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Tag::find($id);
        $model->name = $request->input('name');
        if($model->save()){
            flash()->overlay('修改成功', '后台修改标签');
        }else{
            flash()->overlay('修改失败', '后台修改标签');
        }
        return redirect('admin/tag');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Tag::destroy($id)){
            return $this->ajaxReturn(1, '删除成功');
        }else{
            return $this->ajaxReturn(0, '删除失败');
        }
    }
}
