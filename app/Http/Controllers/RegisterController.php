<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class RegisterController extends baseController
{
    
    /**
     * 用户注册
     */
    public function create(Request $request)
    {
        //表单验证
        $this->validate($request,[
            'username' => 'required',
            'user' => 'required',
            'phone' => 'required',
            'Email' => 'required|email',
            'psw' => 'required|regex:/\w{6,12}/|same:pswagain'
        ],[
            'username.required' => '用户名不能为空',
            'user.required' => '联系人不能为空',
            'phone.required' => '电话号码不能为空',
            'Email.required' =>'邮箱不能为空',
            'Email.email' => '邮箱格式错误',
            'psw.required' => '密码不能为空',
            'psw.regex' => '密码格式错误 请输入 6-12为字符',
            'psw.same' => '两次密码不一致'
        ]);
    

        //数据插入
        $yhname = $request->get('username');
        $xname = $request->get('user');
        $phone = $request->get('phone');
        $email = $request->get('Email');
        $password = Hash::make($request->get('psw'));
        $data = [
            'yhname' => $yhname,
            'xname' => $xname,
            'phone' => $phone,
            'email' => $email,
            'password' => $passwordd
        ];

        $check = User::create($data);
   
        if($check) {
            return $this->returnMsg('200','ok');
        } else {
            return $this->returnMsg('500','create failed');
        }

    }

    
}