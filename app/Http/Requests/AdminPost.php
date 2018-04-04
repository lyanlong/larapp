<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Validator;
use Hash;

class AdminPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admin')->check();
//        return false;
    }

    public function addValidate()
    {
        Validator::extend('check_password', function($attribute, $value, $parameters, $validator) {
            return Hash::check($value, Auth::guard('admin')->user()->password);
        });
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->addValidate();
        return [
            //
            'ori_password'          => 'sometimes|required|check_password',
            'password'              => 'sometimes|required|confirmed|different:ori_password',
            'password_confirmation' => 'sometimes|required',
        ];
    }

    public function messages()
    {
        return [
            'ori_password.required'             => '原密码错误',
            'ori_password.check_password'       => '账号或密码错误',
            'password.required'                 => '密码不能为空',
            'password.different'                => '密码未更改',
            'password.confirmed'                => '确认密码不一致',
            'password_confirmation.required'    => '确认密码不能为空',
        ];
    }
}
