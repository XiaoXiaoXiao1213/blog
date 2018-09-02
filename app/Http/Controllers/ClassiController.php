<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;
use App\cuttingedge;
use App\semmar;
use App\bclassification;
use App\sclassification;
class ClassiController extends baseController
{
    //首页分类
    public function classification( )
    {
        $info1 = bclassification::where('id','>','0')->get(['firstb']);
        $info2 = bclassification::get(['secondb']);
        $info3 = bclassification::get(['thirdb']);
        $info4 = bclassification::get(['fourthb']);
        $info5 = bclassification::get(['fifthb']);
        $info6 = bclassification::get(['sixthb']);
        $info7 = bclassification::get(['seventhb']);
        $info8 = bclassification::get(['eigthb']);
        $info9 = bclassification::get(['ninthb']);
        $info10 = bclassification::get(['tenthb']);
        $array2 = [];
        for($numm = 1;$numm<11;$numm++){
            foreach($info.$numm as $a){                    
                $array1 = [];
                $b = 1;
                $infoo.$b.$numm = sclassification::where(['mclassic',$a],
                                                          ['blassid',$info.$numm])->get(['name']);
                
                $array1[$a] = $infoo.$b.$numm;
                 
            }
            $array2['firstb'] = $array1;
        }
        return $this->returnMsg('200','0k',$array2);
    }



    //新品
    public function newGoods(Request $request)
    {
        $type = $request->input('type','');
        if($type==null){
            return $this->returnMsg('500','fail');
        }
        $goods = Goods::where('bclassi',$type)->get();
        $num = count($goods);
        if(!$num){
            return $this->returnMsg('500','fail');
        }
        if($num<=7){
            $check = $goods;
        }else{
            $check = Goods::where('bclassi',$type)->limit(7)->orderBy('id','desc')->get();
        }

        return $this->returnMsg('200','ok',$check);
    }


    //尖端科技
    public function thech(Request $request)
    {
        $info = $request->input('num',1);
        if($info==1){
            $data = cuttingedge::limit(4)->orderBy('id','desc')->get(['pic','inform','mv']);
        }else if($info==2){
            $data = semmar::limit(4)->orderBy('id','desc')->get(['pic','title','inform','mv']);
        }else if($info==3){
            $data = eatmedicine::limit(4)->orderBy('id','desc')->get(['pic','title','inform','file']);
        }else{
            $data = [];
        }

        if($data){
            return $this->returnMsg('200','ok',$data);
        }else{
            return $this->returnMsg('5005','fail');
        }
    }


    
}
