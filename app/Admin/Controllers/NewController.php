<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\News;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Show;

class NewController extends AdminController
{
    protected $title = '信息';

    protected function grid()
    {
        $grid = new Grid(new News([ 'admin' ]));

        $grid->column('id', 'ID')->sortable();
        $grid->column('title', '标题');
        $grid->column('file_name', '文件名');
        $grid->column('lang', '语言');
        $grid->column('seo_title', 'SEO标题');
        $grid->column('keywords', '关键词');
        $grid->column('description', '描述');
        $grid->column('content', '内容');
        $grid->column('target', '打开方式');
        $grid->column('thumb', '缩略图')->image(null, 100, 100);
        $grid->column('admin.name', '作者');
        $grid->column('is_top', '推荐')->switch();
        $grid->column('status', '状态')->switch();

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show($id, new News([ 'admin' ]));

        $show->field('title', '标题');
        $show->field('file_name', '文件名');
        $show->field('lang', '语言');
        $show->field('seo_title', 'SEO标题');
        $show->field('keywords', '关键词');
        $show->field('description', '描述');
        $show->field('content', '内容');
        $show->field('target', '打开方式');
        $show->field('thumb', '缩略图')->image();
        $show->field('admin.name', '作者');
        $show->field('is_top', '推荐')->using([ 0 => '否', 1 => '是' ]);
        $show->field('status', '状态')->using([ 1 => '启用', 0 => '禁用' ]);
        $show->field('created_at', '创建时间');
        $show->field('updated_at', '更新时间');

        return $show;
    }

    protected function form()
    {
        $form = new Form(News::class);

        $form->number('author', '作者ID')->default(Admin::user()->id)->required();
        $form->text('title', '标题')->required();
        $form->text('file_name', '文件名')->required()->rules('unique:news,file_name,{{id}}', [
            'unique' => '该文件名已存在。'
        ]);
        $form->text('lang', '语言')->required()->default('cn');
        $form->text('seo_title', 'SEO标题')->required();
        $form->text('keywords', '关键词')->required();
        $form->text('description', '描述')->required();
        $form->textarea('content', '内容')->required();
        $form->select('target', '打开方式')->options([
            '_blank' => '_blank',
            '_self' => '_self'
        ])->default('_blank')->required();
        $form->image('thumb', '缩略图')->autoUpload()->required();
        $form->select('is_top', '推荐')->options([
            0 => '否',
            1 => '是'
        ])->default(0)->required();
        $form->select('status', '状态')->options([
            1 => '启用',
            0 => '禁用'
        ])->default(1)->required();

        return $form;
    }
}
