<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MyController extends CommonController
{
    //
    public function passwordForm()
    {
        return view('admin.my.passwordForm');
    }

    public function changePassword(AdminPost $request)
    {
        $model = Auth::guard('admin')->user();
        $model->password = bcrypt($request['password']);
        $model->save();
        flash()->overlay('密码修改成功', '后台账号密码修改');
        return redirect()->back();
    }
}
