<?php

namespace App\Http\Controllers\Admin;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Request;  //外观模式，不能和注入模式同时引用
class EntryController extends Controller
{
    public function __construct()
    {
        //该类除了 'loginForm', 'login' 方法外，其余方法都必须先经过中间件 auth.admin 的过滤。
        $this->middleware('auth.admin')->except(['loginForm', 'login']);
    }

    public function index()
    {
//        $userInfo = Auth::guard('admin')->user();
//        return view('admin.entry.index')->with('userinfo',$userInfo);
          return view('admin.entry.index');
    }

    //
    public function loginForm()
    {
        return view('admin.entry.login');
    }

    public function login()
    {
        $status = Auth::guard('admin')->attempt([//使用 admin守卫来验证账号密码，laravel默认守卫是 web，admin守卫需自行配置
            'username' => Request::input('username'),
            'password' => Request::input('password'),
        ]);
        if ($status) {
            return redirect('admin/index');
        } else {
            flash()->overlay('用户名或密码错误', 'larapp 登录提示');
            return redirect('admin/login');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
