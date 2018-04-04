<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User; //提供登录账号验证服务

class Admin extends User
{
    //
    protected $rememberTokenName = '';
}
