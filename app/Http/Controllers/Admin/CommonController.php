<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    //
    public function __construct()
    {
        //该类方法都必须先经过中间件 auth.admin 的过滤。
        $this->middleware('auth.admin');
    }

    /**
     * @param int $status
     * @param string $msg
     * @return string
     */
    public function ajaxReturn($status = 1, $msg = 'success')
    {
        return json_encode(['status'=> $status, 'msg' => $msg]);
    }
}
