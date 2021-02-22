<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Block;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Show;
use App\Models\Block as BlockModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BlockController extends AdminController
{
    protected $title = '区块信息';

    protected function grid()
    {
        $grid = new Grid(new Block());

        $grid->column('id', 'ID')->sortable();
        $grid->column('name', '名称');
        $grid->column('title', '标题');
        $grid->column('description', '描述');
        $grid->column('thumb', '缩略图')->image(null, 100, 100);
        $grid->column('content', '内容');
        $grid->column('status', '状态')->switch();

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show($id, BlockModel::findOrFail($id));

        $show->field('id', 'ID');
        $show->field('name', '名称');
        $show->field('title', '标题');
        $show->field('description', '描述');
        $show->field('thumb', '缩略图')->image();
        $show->field('content', '内容');
        $show->field('status', '状态')->using([ 0 => '禁用', 1 => '启用' ]);
        $show->field('created_at', '创建时间');
        $show->field('updated_at', '创建时间');

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Block());

        $form->text('name', '名称')->required();
        $form->text('title', '标题')->required();
        $form->text('description', '描述')->required();
        $form->image('thumb', '缩略图')->autoUpload()->required();
        $form->textarea('content', '内容')->required();
        $form->select('status', '状态')->options([
            0 => '禁用',
            1 => '启用'
        ])->default(0)->required();

        return $form;
    }
}
