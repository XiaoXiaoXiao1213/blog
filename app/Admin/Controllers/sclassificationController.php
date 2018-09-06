<?php

namespace App\Admin\Controllers;

use App\sclassification;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class sclassificationController extends Controller
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

            $content->header('小分类');
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
            $content->description('');

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
        return Admin::grid(sclassification::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->bclassi('大分类');
            $grid->mclassic('中分类');
            $grid->name('名称');
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
        return Admin::form(sclassification::class, function (Form $form) {

            $form->display('id', 'ID');
            $bclassi = [
                '容器' => '容器',
                '计量器具/材料/耗材' => '计量器具/材料/耗材',
                '实验用品' => '实验用品',
                '通用仪器' => '通用仪器',
                '理化前处理' =>'理化前处理',
                '理化分析' => '理化分析',
                '环境检测和分析' => '环境检测和分析',
                '工业微生物检测' => '工业微生物检测',
                '临床诊断' => '临床诊断',
                '个人防护' => '个人防护'
            ];
            $option1 = [
                '无' => '无',
                'PP容器' => 'PP容器',
                'PE容器' => 'PE容器',
                'PS容器' => 'PS容器',
                '氟树脂容器' => '氟树脂容器',
                '其他树脂容器' => '其他树脂容器',
                '密封盒' => '密封盒',
                '密封罐/水桶' => '密封罐/水桶',
                '盆/托盘' => '盆/托盘',
                '小盒' => '小盒',
                '清洗瓶/手压泵试剂瓶/喷雾器' => '清洗瓶/手压泵试剂瓶/喷雾器',
                '螺口瓶/试剂瓶' => '螺口瓶/试剂瓶',
                '标准瓶/滴瓶' => '标准瓶/滴瓶',
                '样品瓶' => '样品瓶',
                '微量瓶/安瓿瓶' => '微量瓶/安瓿瓶',
                '不锈钢盆/托盘' => '不锈钢盆/托盘',
                '不锈钢罐/小型容器/不锈钢烧杯' => '不锈钢罐/小型容器/不锈钢烧杯',
                '不锈钢桶' => '不锈钢桶',
                '搪瓷/铝容器/其他容器' => '搪瓷/铝容器/其他容器',
                '冷冻盒' => '冷冻盒',
                '保温/保冷容器' => '保温/保冷容器',
                '冻存管' => '冻存管',
                '周转箱' => '周转箱',
                '折叠周转箱' => '折叠周转箱',
                '大型容器/水箱' => '大型容器/水箱'
            ];
            $moption9 = [
                '无' => '无',
                '水质/土壤分析' => '水质/土壤分析',
                '空气质量分析' => '空气质量分析',
                '环境测量分析' => '环境测量分析',
                '环境辐射检测分析' => '环境辐射检测分析'
            ];
            $soption9 = [
                
                '无' => '无',
                '浊度计' => '浊度计',
                '余氯比色计' => '余氯比色计',
                '余氯总氯测定仪' => '余氯总氯测定仪',
                'pH计' => 'pH计',
                '粉尘/颗粒采样器' => '粉尘/颗粒采样器',
                '空气采样器' => '空气采样器',
                '单一气体检测仪' => '单一气体检测仪',
                '综合气体检测仪' => '综合气体检测仪',
                '粉尘/颗粒测定仪' => '粉尘/颗粒测定仪',
                'VOC测仪' => 'VOC测仪',
                '其它空气测仪' => '其它空气测仪',
                '天平' => '天平',
                '风速仪' => '风速仪',
                '温度计' => '温度计',
                '干湿表' => '干湿表',
                '气压计' => '气压计',
                '流量计' => '流量计',
                '色度计' => '色度计',
                '噪音仪' => '噪音仪',
                '射线/红外线/紫外线测定仪' => '射线/红外线/紫外线测定仪',
                '声级计' => '声级计',
                '其它环境测仪' => '其它环境测仪',
                'αβ放射仪' => 'αβ放射仪',
                'Xγ辐射仪' => 'Xγ辐射仪',
                '电磁辐射测仪' => '电磁辐射测仪',
                '辐射剂量计' => '辐射剂量计',
                '其它辐射检测仪' => '其它辐射检测仪',
            ];

            $form->select('bclassi')->options($bclassi);
            $form->select('mclassic')->options($moption9);
            $form->select('name')->options($soption9);
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
