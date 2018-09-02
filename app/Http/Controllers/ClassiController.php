<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;

class ClassiController extends baseController
{
    //首页分类
    public function classification(Request $request)
    {
        $info1 = bclassifications::get('firstb');
        $info2 = bclassifications::get('secondb');
        $info3 = bclassifications::get('thirdb');
        $info4 = bclassifications::get('fourthb');
        $info5 = bclassifications::get('fifthb');
        $info6 = bclassifications::get('sixthb');
        $info7 = bclassifications::get('seventhb');
        $info8 = bclassifications::get('eigthb');
        $info9 = bclassifications::get('ninthb');
        $info10 = bclassifications::get('tenthb');
        $array2 = [];
        for($numm = 1;$numm<11;$numm++){
            foreach($info.$numm as $a){                    
                $array1 = [];
                $b = 1;
                $infoo.$b.$numm = sclassifications::where(['mclassic',$a],
                                                          ['blassid',$info.$numm])->get('name');
                
                $array1[$a] = $infoo.$b.$numm;
                 
            }
            $array2['firstb'] = $array1;
        }
        return $this->returnMsg('200','0k',$array2);
    }



    //新品
    public function newGoods(Request $request)
    {
        $type = $request->input('type');
        $goods = goods::where('bclassi',(int)$type)->get();
        $num = count($goods);
        if(!$num){
            return $this->returnMsg('500','fail');
        }
        if($num<=7){
            $check = $goods;
        }else{
            $check = Goods::where('bclassi',(int)$type)->limit(7)->orderBy('id','desc')->get();
        }

        return $this->returnMsg('200','ok',$check);
    }


    //尖端科技
    public function thech(Request $request)
    {
        $info = $request-> input('num',1);
        if($info==1){
            $data = cuttingedges::limit(4)->orderBy('id','desc')->get('pic','inform','mv');
        }else if($info==2){
            $data = semmars::limit(4)->orderBy('id','desc')->get('pic','title','inform','mv');
        }else if($info==3){
            $data = eatmedicines::limit(4)->orderBy('id','desc')->get('pic','title','inform','file');
        }else{
            $data = [];
        }

        if($data){
            return $this->returnMsg('200','ok',$dara);
        }else{
            return $this->returnMsg('5005','fail');
        }
    }


    
}
