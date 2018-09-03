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
        $info1 = bclassification::get(['first']);
        $info2 = bclassification::get(['second']);
        $info3 = bclassification::get(['third']);
        $info4 = bclassification::get(['fourth']);
        $info5 = bclassification::get(['fifth']);
        $info6 = bclassification::get(['sixth']);
        $info7 = bclassification::get(['seventh']);
        $info8 = bclassification::get(['eigth']);
        $info9 = bclassification::get(['ninth']);
        $info10 = bclassification::get(['tenth']);
        $info = ['0' => $info1,
                 '1' => $info2,
                 '2' => $info3,
                 '3' => $info4,
                 '4' => $info5,
                 '5' => $info6,
                 '6' => $info7,
                 '7' => $info8,
                 '8' => $info9,
                 '9' => $info10
                ];
        
        $array1 = array();
        $array = array(array());
        for($num = 0;$num<10;$num++){
            foreach($info[$num] as $a){                    
                $array1 = array();
            
                $array1[$a] = sclassification::where(['mclassic',$a],
                                                         ['blassic',$info[$num]])->get(['name']);          
            }
            
            array_push($array,$array1);
        }
        return $this->returnMsg('200','0k',$array);
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
