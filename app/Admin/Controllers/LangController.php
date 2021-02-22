<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Lang;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use App\Models\Lang as LangModel;
use Dcat\Admin\Show;
use Illuminate\Http\Request;

class LangController extends AdminController
{
    protected $title = '语言';

    protected function grid()
    {
        $grid = new Grid(new Lang());

        $grid->column('id', 'ID')->sortable();
        $grid->column('name', '名称');
        $grid->column('lang', '标识');
        $grid->column('status', '状态')->switch();

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show($id, LangModel::findOrFail($id));

        $show->field('id', 'ID');
        $show->field('name', '名称');
        $show->field('lang', '标识');
        $show->field('status', '状态')->using([ 0 => '禁用', 1 => '启用' ]);
        $show->field('created_at', '创建时间');
        $show->field('updated_at', '更新时间');

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Lang());

        $form->text('name', '名称');
        $form->text('lang', '标识');
        $form->select('status', '状态')->options([
            0 => '禁用',
            1 => '启用'
        ])->default(0);

        return $form;
    }
}
