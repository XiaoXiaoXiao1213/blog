<?php

namespace App\Admin\Controllers;

use App\bclassification;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class bclassificationController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('大分类');
            $content->description('');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('编辑');
            $content->description(' ');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('创建');
            $content->description('');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(bclassification::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->first('容器');
            $grid->second('计量器具/材料/耗材');
            $grid->third('实验用品');
            $grid->fourth('通用仪器');
            $grid->fifth('理化前处理');
            $grid->sixth('理化分析');
            $grid->seventh('环境检测和分析');
            $grid->eigth('工业微生物检测');
            $grid->ninth('临床诊断');
            $grid->tenth('个人防护');
            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(bclassification::class, function (Form $form) {

            $form->display('id', 'ID');
            $option1=[
                '无' => '无',
                '树脂容器' => '树脂容器',
                '树脂特殊容器' => '树脂特殊容器',
                '玻璃容器' => '玻璃容器',
                '金属容器' => '金属容器',
                '保温/冷冻保存容器' => '保温/冷冻保存容器',
                '周转箱/大型容器' => '周转箱/大型容器'
            ];
            $option2 = [
                '无' => '无',
                '玻璃机器/器具类' => '玻璃机器/器具类',
                '玻璃/树脂量器' => '玻璃/树脂量器',
                '试管/离心管/漏斗' => '试管/离心管/漏斗',
                '分离用品/滤纸/过滤器' => '分离用品/滤纸/过滤器',
                '塞子/盖子' => '塞子/盖子',
                '培养/检测机器/相关产品/试纸' => '培养/检测机器/相关产品/试纸',
                '分注/移液器' => '分注/移液器',
                '金属/树脂/陶瓷制实验室用品/镊子' => '金属/树脂/陶瓷制实验室用品/镊子'
            ];
            $option3 = [
                '无' => '无',
                '管件零件（水管/软管/连接件）' => '管件零件（水管/软管/连接件）',
                '科研用素材/材料' => '科研用素材/材料',
                '化学制品（油/润滑油/胶水等）' => '化学制品（油/润滑油/胶水等）',
                '实验室用品/环境用品' => '实验室用品/环境用品',
                '文具' => '文具',
                '刷子/洗涤剂/清洗辅助用品' => '刷子/洗涤剂/清洗辅助用品'
            ];
            $option4 = [
                '无' => '无',
                '培养箱' => '培养箱',
                '二氧化碳培养箱' => '二氧化碳培养箱',
                '光照培养箱/人工气候箱' => '光照培养箱/人工气候箱',
                '恒温恒湿箱/温控产品' => '恒温恒湿箱/温控产品',
                '振荡器/振荡培养箱系列' => '振荡器/振荡培养箱系列',
                '干燥箱系列' => '干燥箱系列',
                '真空干燥系列' => '真空干燥系列',
                '水槽/水浴锅/恒温循环槽系列' => '水槽/水浴锅/恒温循环槽系列',
                '药品稳定性试验箱系列' => '药品稳定性试验箱系列',
                '试验箱系列' => '试验箱系列',
                '移液产品' => '移液产品',
                '蒸馏混合' => '蒸馏混合',
                '离心系列' => '离心系列',
                '纯水机系列' => '纯水机系列',
                '净化工作台/生物安全柜系列' => '净化工作台/生物安全柜系列',
                '灭菌锅系列' => '灭菌锅系列',
                '冻存冷藏系列' => '冻存冷藏系列',
                '显微镜' => '显微镜'
            ];
            $option5 = [
                '无' => '无',
                '有机样品前处理' => '有机样品前处理',
                '无机样品前处理' => '无机样品前处理',
                '实验室设备' => '实验室设备',
                '配件及耗材' => '配件及耗材',
            ];

            $option6 = [
                '无' => '无',
                '样品制备及分析' => '样品制备及分析',
                '药品微生物检验（2015版）' => '药品微生物检验（2015版）',
                '化妆品检验系列' => '化妆品检验系列',
                '诊断血清' => '诊断血清',
                '质谱鉴定' => '质谱鉴定',
                '生化鉴定' => '生化鉴定',
            ];
            $option7 = [
                '无' => '无',
                '手部防护系列' => '手部防护系列',
                '面部防护系列' => '面部防护系列',
                '药灾/防灾对策用品' => '药灾/防灾对策用品',
                '胶带/各种袋' => '胶带/各种袋',
                '无尘环境相关产品' => '无尘环境相关产品',
                '防静电相关产品' => '防静电相关产品',
                '清扫/卫生关联产品' => '清扫/卫生关联产品',
                '收纳/搬运相关产品' => '收纳/搬运相关产品',
                '电子器件/零件' => '电子器件/零件'
            ];
            $option8 = [
                '无' => '无',
                '色谱分析' => '色谱分析',
                '质谱分析' => '质谱分析',
                '原子分析' => '原子分析',
                '其他' => '其他'
            ];

            $option9 = [
                '无' => '无',
                '水质/土壤分析' => '水质/土壤分析',
                '空气质量分析' => '空气质量分析',
                '环境测量分析' => '环境测量分析',
                '环境辐射检测分析' => '环境辐射检测分析'
            ];

            $option10 = [
                        '无' => '无',
                        '手部防护系列' => '手部防护系列',
                        '面部防护系列' => '面部防护系列',
                        '药灾/防灾对策用品' => '药灾/防灾对策用品',
                        '胶带/各种袋' => '胶带/各种袋',
                        '无尘环境相关产品' => '无尘环境相关产品',
                        '防静电相关产品' => '防静电相关产品',
                        '清扫/卫生关联产品' => '清扫/卫生关联产品',
                        '收纳/搬运相关产品' => '收纳/搬运相关产品',
                        '电子器件/零件' => '电子器件/零件'
            ];
            $form->select('first')->options($option1);
            $form->select('second')->options($option2);
            $form->select('third')->options($option3);
            $form->select('fourth')->options($option4);
            $form->select('fifth')->options($option5);
            $form->select('sixth')->options($option6);
            $form->select('seventh')->options($option7);
            $form->select('eigth')->options($option8);
            $form->select('ninth')->options($option9);
            $form->select('tenth')->options($option10);
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
