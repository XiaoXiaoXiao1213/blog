<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodsController extends Controller
{
    //首页分类中查找商品 
    public function goodsTable(Request $request)
    {
        $mm = $request -> input('mclassi','');
        $ss = $request -> input('sclassi','');
        if($mm){
            $info = goods::where(['mclassi',$mm])->get();
        return $this->returnMsg('200','ok',$info);
        }
        if($ss){
            $info = goods::where(['sclassi',$ss])->get();
        return $this->returnMsg('200','ok',$info);
        }
    }

    //商品页
    public function goods(Request $request)
    {
        $info = $request -> input('Go_name');
        $goods = goods::where('Go_name',$info)->get();
        return $this->returnMsg('200','ok',$info);
    }

    //商品详情
    public function goodsdetail(Request $request)
    {
        $info = $request -> input('Go_name');
        $good = goods_details::where('Go_name',$info)->orderBy('key','desc')->get('first','second','third','fourth','fifth');
        $num = count($good);
        if($num){
            return $this -> returnMsg('5005','no found');
        }else{  
            foreach($good as $key =>$a)
              {
                foreach($a as $k => $b)
                if(empty($b))
                {
                  unset($a[$k]);
                }
              }
            return $this -> returnMsg('200','ok',$good);                 
        }
    }

    //更多产品
    public function goodsmore(Request $request)
    {
        $info = $request -> input('bclassi','');
        $good = goods::where('bclassi',$info)->get('Go_name','pic1');
        $num = count($good);
        if(!$num){
            return $this->returnMsg('5005','no found');
        }
        if($num<=30){
            return $this->returnMsg('200','ok',$good);
        }else{
            $good = goods::where('bclassi',$info)->limit(30)->get('Go_name','pic1');
            return $this->returnMsg('200','ok'.$good);
        }
    }

    //全部搜索
    public function allsearch(Request $request)
    {
        $name = $request->input('name','');
        $page = $request->input('page',1);
        $brand = $request->input('brand','');
        $type = $request->input('tpye','');
        
        if(!$name){
            return $this->returnMsg('5005','no param');
        }
        if(!$band&&!$type){
            $return[] = goods::where('Go_name','like','%'.$name.'%')
                             ->orwhere('brand','like','%'.$name.'%')
                             ->orwhere('mclassi','like','%'.$name.'%')
                             ->orwhere('bclassi','like','%',$name.'%')
                             ->orwhere('sclassi','like','%'.$name.'%')
                             ->skip(($page-1)*30)->limit(30)->get('Go_name','pic1');                  
            
            $info1 = goods::where('Go_name','like','%'.$name.'%')
                           ->orwhere('brand','like','%'.$name.'%')
                           ->orwhere('mclassi','like','%'.$name.'%')
                           ->orwhere('bclassi','like','%',$name.'%')
                           ->orwhere('sclassi','like','%'.$name.'%')
                           ->get('brand');
            
            array_unique($info1);
            
            $info2 = goods::where('Go_name','like','%'.$name.'%')
                            ->orwhere('brand','like','%'.$name.'%')
                            ->orwhere('mclassi','like','%'.$name.'%')
                            ->orwhere('bclassi','like','%',$name.'%')
                            ->orwhere('sclassi','like','%'.$name.'%')
                            ->get('sclassi');

            array_unique($info2);
              
        }
        if($brand&&!$type){
            $return = goods::where(['Go_name','like','%'.$name.'%'],['brand',$brand])
                             ->orwhere(['mclassi','like','%'.$name.'%'],['brand',$brand])
                             ->orwhere(['bclassi','like','%',$name.'%'],['brand',$brand])
                             ->orwhere(['sclassi','like','%'.$name.'%'],['brand',$brand])
                             ->skip(($page-1)*30)->limit(30)->get('Go_name','pic1');   
            
            $info1 = $brand;

            $info2 = goods::where(['Go_name','like','%'.$name.'%'],['brand',$brand])
                             ->orwhere(['mclassi','like','%'.$name.'%'],['brand',$brand])
                             ->orwhere(['bclassi','like','%',$name.'%'],['brand',$brand])
                             ->orwhere(['sclassi','like','%'.$name.'%'],['brand',$brand])
                             ->get('sclassi');
            
            array_unique($info2);


        }
        if(!$brand&&$type){
            $return = goods::where(['Go_name','like','%'.$name.'%'],['sclassi',$type])
                             ->orwhere(['brand','like','%'.$name.'%'],['sclassi',$type])
                             ->skip(($page-1)*30)->limit(30)->get('Go_name','pic1');   
        
            $info1 = goods::where(['Go_name','like','%'.$name.'%'],['sclassi',$type])
                             ->orwhere(['brand','like','%'.$name.'%'],['sclassi',$type])
                             ->get('brand');
            
            array_unique($info1);
            $info2 = $type;
        
            
        
        
        }
        if($brand&&$type){
            $return = goods::where(['Go_name','like','%'.$name.'%'],['sclassi',$type],['brand',$brand])
                             ->skip(($page-1)*30)->limit(30)->get('Go_name','pic1');
            $info1 = $brand;
            $info2 = $type;
        
        }

        return $this->returnMsg('200','ok',['brand'=>$info1,'type'=>$info2,'data'=>$return]);


    
    }

    //名称搜索
    public function namesearch(Request $request){
        $name = $request->input('name','');
        $page = $request->input('page',1);
        $brand = $request->input('brand','');
        $type = $request->input('tpye','');
        
        if(!$name){
            return $this->returnMsg('5005','no param');
        }
        if(!$band&&!$type){
            $return[] = goods::where('Go_name','like','%'.$name.'%')
                             ->skip(($page-1)*30)->limit(30)->get('Go_name','pic1');                  
            
            $info1 = goods::where('Go_name','like','%'.$name.'%')
                           ->get('brand');
            
            array_unique($info1);
            
            $info2 = goods::where('Go_name','like','%'.$name.'%')
                            ->get('sclassi');

            array_unique($info2);
              
        }
        if($brand&&!$type){
            $return = goods::where(['Go_name','like','%'.$name.'%'],['brand',$brand])
                             ->skip(($page-1)*30)->limit(30)->get('Go_name','pic1');   
            
            $info1 = $brand;

            $info2 = goods::where(['Go_name','like','%'.$name.'%'],['brand',$brand])
                             ->get('sclassi');
            
            array_unique($info2);


        }
        if(!$brand&&$type){
            $return = goods::where(['Go_name','like','%'.$name.'%'],['sclassi',$type])
                             ->skip(($page-1)*30)->limit(30)->get('Go_name','pic1');   
        
            $info1 = goods::where(['Go_name','like','%'.$name.'%'],['sclassi',$type])
                             ->get('brand');
            
            array_unique($info1);
            $info2 = $type;
        
            
        
        
        }
        if($brand&&$type){
            $return = goods::where(['Go_name','like','%'.$name.'%'],['sclassi',$type],['brand',$brand])
                             ->skip(($page-1)*30)->limit(30)->get('Go_name','pic1');
            $info1 = $brand;
            $info2 = $type;
        }
        return $this->returnMsg('200','ok',['brand'=>$info1,'type'=>$info2,'data'=>$return]);
    }

}
