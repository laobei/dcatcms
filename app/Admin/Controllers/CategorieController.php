<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Categorie;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Show;
use App\Models\Categorie as CategorieModel;
use Illuminate\Http\Request;

class CategorieController extends AdminController
{
    protected $title = '栏目';

    protected function grid()
    {
        $grid = new Grid(new Categorie());

        $grid->column('id', 'ID');
        $grid->column('name', '名称');
        $grid->column('module', '模块');
        $grid->column('icon', '栏目ICON')->image(null, 30, 30);
        $grid->column('status', '状态')->switch();
        $grid->column('sort', '排序');

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show($id, CategorieModel::findOrFail($id));

        $show->field('id', 'ID');
        $show->field('pid', '上级栏目ID');
        $show->field('name', '名称');
        $show->field('module', '模块');
        $show->field('file_name', '文件名');
        $show->field('lang', '语言');
        $show->field('seo_title', 'seo标题');
        $show->field('keywords', '关键词');
        $show->field('description', '描述');
        $show->field('content', '内容');
        $show->field('target', '打开方式');
        $show->field('link_url', '外部链接地址');
        $show->field('banner', '栏目轮播图')->image();
        $show->field('icon', '栏目ICON')->image();
        $show->field('is_show', '显示到栏目');
        $show->field('status', '状态');
        $show->field('nofollow', '搜索引擎追踪');
        $show->field('module_type', '栏目模式');
        $show->field('next_nav', '是否显示下一栏目内容');
        $show->field('sort', '排序');
        $show->field('template_index', '频道页模板');
        $show->field('template_list', '列表页模板');
        $show->field('template_detail', '详情页模板');
        $show->field('template_page', '单页模板');
        $show->field('created_at', '创建时间');
        $show->field('updated_at', '更新时间');

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Categorie());

        $form->number('pid', '上级栏目ID');
        $form->text('name', '名称');
        $form->text('module', '模块');
        $form->text('file_name', '文件名');
        $form->text('lang', '语言')->default('cn');
        $form->text('seo_title', 'seo标题');
        $form->text('keywords', '关键词');
        $form->text('description', '描述');
        $form->textarea('content', '内容');
        $form->select('target', '打开方式')->options([
            '_blank' => '_blank',
            '_self' => '_self'
        ])->default('_blank');
        $form->url('link_url', '外部链接地址');
        $form->image('banner', '栏目轮播图')->autoUpload();
        $form->file('icon', '栏目ICON')->autoUpload();
        $form->select('is_show', '显示到栏目')->options([
            1 => '显示',
            0 => '不显示'
        ])->default(1);
        $form->select('status', '状态')->options([
            1 => '启用',
            0 => '禁用'
        ])->default(1);
        $form->select('nofollow', '搜索引擎追踪')->options([
            0 => '否',
            1 => '是'
        ])->default(0);
        $form->select('module_type', '栏目模式')->options([
            0 => '频道',
            1 => '列表',
            2 => '单页',
            3 => '外部链接'
        ])->default(0);
        $form->select('next_nav', '显示下一栏目内容')->options([
            0 => '否',
            1 => '是'
        ])->default(0);
        $form->number('sort', '排序')->default(100);
        $form->text('template_index', '频道页模板')->default('dcatcms.news-index');
        $form->text('template_list', '列表页模板')->default('dcatcms.news-list');
        $form->text('template_detail', '详情页模板')->default('dcatcms.news-detail');
        $form->text('template_page', '单页模板')->default('dcatcms.page');

        return $form;
    }
}
