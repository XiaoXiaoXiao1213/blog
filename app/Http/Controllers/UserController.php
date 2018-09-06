<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Technical_consulting;
use App\notice;
use App\Application_registration;
use App\connection;
use Hash;

class UserController extends baseController
{

    //用户信息查询
    public function userinform(Request $request)
    {
        $id = $request->input('id','1');
        $info = User::where('id',$id)->get(['yhname','xname','phone','email']);
        if(!count($info)){
            return $this->returnMsg('5005','no found');
        }else{
            return $this->returnMsg('200','ok',$info);
        }
        
    }
    //技术咨询
    public function Tec_Consulting(Request $request){
        $CooName = $request->get('Coo_name','');
        $CooAddress = $request->get('Coo_address','');
        $UserName = $request->get('user_name','');
        $UserPhone = $request->get('user_phone','');
        $Email = $request->get('email','');
        $GoodsName = $requset->get('Goods_name','');
        $Contect = $request->get('contect','');
        $Email2 = $request->get('email2','');
    
    
        $data = [
            'Coo_name' => $CooName,
            'Coo_address' => $CooAddress,
            'user_name' => $UserName,
            'user_phone' => $UserPhone,
            'email' => $Email,
            'Goods_name' => $GoodsName,
            'contect' => $Contect,
            'email2' => $Email2
        ];
        $check = Technical_consulting::create($data);
        if($check){
            return $this->returnMsg('200','ok');
        } else {
            return $this->returnMsg('5000','create failed');
        }
    }
    //合作登记申请
    public function app_Registrations(Request $requset) {
        $data1 = $request->get('coo_name','');
        $data2 = $requset->get('coo_address','');
        $data3 = $requset->get('user_name','');
        $data4 = $requset->get('user_phone','');
        $data5 = $requset->get('Co_categories','');
        $data6 = $requset->get('Co_profile','');
        //文件
        $data7 = $requset->get('Co_file','');
        $data8 = $requset->get('Bu_content','');
        $data9 = $requset->get('Bu_nature','');
        $data10 = $requset->get('Ca_composition','');
        
        //插入数据表
        $data = [
            'coo_name' => $data1,
            'coo_address' => $data2,
            'user_name' => $data3,
            'user_phone' => $data4,
            'Co_categories' => $data5,
            'Co_profile' => $data6,
            'Co_file' => $data7,
            'Bu_content' => $data8,
            'Bu_nature' => $data9,
            'Ca_composition' => $data10
        ];
        $check = Application_registration::create($data);
        if($check){
            return $this->returnMsg('200','ok');
        } else {
            return $this->returnMsg('5000','create failed');
        }
    }
    //公告信息

        public function notices(Request $request)
        {
            
            $info = notice::get(['created_at','noticeName','noticeFile']);            
            return $this->returnMsg('200','ok',$info);
        }

        //公告内容
        public function notice(Request $request)
        {
            $name = $request->input('name','');
            $file = notice::where('noticeName',$name)->get(['noticeFile']);
            if($file){
                return $this->returnMsg('200','ok',$file);
            }else{
                return $this->returnMsg('5005','no found');
            }
        }

        //用户登录
        public function login(Request $request)
        {
            $yhname = $request->get('yhname');
            $password = $request->get('password');
            $user = User::where([
                    ['yhname',$yhname],
                    ['password',sha1($password)]
            ])->first();

            if($user){
                return $this->returnMsg('200','ok',$user);
            }else{
                return $this->returnMsg('500','no user matched');
            }
        }
        
        
        //联系我们
        public function connection(Request $request)
        {
            $name = $request->get('name','');
            $email = $request->get('email','');
            $say = $request->get('say','');
            
            $data = [
                'name' => $name,
                'email' => $email,
                'say' => $say
            ];
            $check = connection::create($data);
            if($check){
                return $this->returnMsg('200','ok');
            }else{
                return $this->returnMsg('5005','fail');
            }
        }

        
        
    }


