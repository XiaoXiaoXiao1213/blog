<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class baseController extends Controller
{
    /**
     * 返回前端的格式
     * 
     * @param string $code 状态码
     * @param string $message 信息
     * @param string $data 数据
     *
     * 
     */

     public function returnMsg($code='200',$message='ok',$data=null)
     {
         $result['status_code']=$code;
         $result['message']=$message;
         $result['data']=$data;
         return $result;
     }
}
