<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Banner;
use App\Models\Banner as BannerModel;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Show;
use Dcat\Admin\Tree\Tools;
use Illuminate\Http\Request;

class BannerController extends AdminController
{
    /**
     * Make a grid title.
     *
     * @var string
     */
    protected $title = '幻灯片';

    /**
     * Make a grid table
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Banner());

        $grid->column('id', __('ID'));
        $grid->column('title', __('标题'));
        $grid->column('description', __('描述'));
        $grid->column('pic_url', __('图片'))->image(null, 60);
        $grid->column('link_url', __('链接地址'))->display(function ($link_url) {
            return '<a href=' . $link_url . '>' . $link_url . '</a>';
        });
        $grid->column('position', __('显示位置'));
        $grid->status('状态')->using([
            1 => '启用',
            0 => '禁用'
        ]);

        return $grid;
    }

    public function detail($id)
    {
        $show = new Show($id, BannerModel::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('title', __('标题'));
        $show->field('description', __('描述'));
        $show->field('pic_url', __('图片地址'));
        $show->field('title_color', __('标题颜色'));
        $show->field('description_color', __('描述颜色'));
        $show->field('link_url', __('链接地址'));
        $show->field('position', __('显示位置'));
        $show->status('状态')->using([ '1' => '启用', '0' => '禁用' ]);
        $show->field('created_at', __('创建时间'));
        $show->field('updated_at', __('更新时间'));

        return $show;
    }

    /**
     * Make/Update a form data
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Banner());

        $form->text('title', __('标题'));
        $form->text('description', __('描述'));
        $form->url('pic_url', __('图片地址'));
        $form->color('title_color', __('标题颜色'))->default('#111111');
        $form->color('description_color', __('描述颜色'))->default('#e5e5e5');
        $form->url('link_url', __('链接地址'));
        $form->text('position', __('显示位置'))->default('home');
        $form->select('status', __('状态'))->options([
            0 => '禁用',
            1 => '启用'
        ])->default(0);

        return $form;
    }
}
