<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Banner;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Show;

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

        $grid->column('id', __('ID'))->sortable();
        $grid->column('title', __('标题'));
        $grid->column('description', __('描述'));
        $grid->column('pic_url', __('图片'))->image(null, 100, 100);
        $grid->column('link_url', __('链接地址'))->link();
        $grid->column('position', __('显示位置'));
        $grid->column('status', '状态')->switch();

        return $grid;
    }

    public function detail($id)
    {
        $show = new Show($id, new Banner());

        $show->field('id', __('ID'));
        $show->field('title', __('标题'));
        $show->field('description', __('描述'));
        $show->field('pic_url', __('图片地址'));
        $show->field('title_color', __('标题颜色'));
        $show->field('description_color', __('描述颜色'));
        $show->field('link_url', __('链接地址'));
        $show->field('position', __('显示位置'));
        $show->field('status', '状态')->using([ 0 => '禁用', 1 => '启用' ]);
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
        $form = new Form(Banner::class);

        $form->text('title', __('标题'))->required();
        $form->text('description', __('描述'))->required();
        $form->url('pic_url', __('图片地址'))->required();
        $form->color('title_color', __('标题颜色'))->default('#111111')->required();
        $form->color('description_color', __('描述颜色'))->default('#e5e5e5')->required();
        $form->url('link_url', __('链接地址'))->required();
        $form->text('position', __('显示位置'))->default('home')->required();
        $form->select('status', '状态')->options([
            1 => '启用',
            0 => '禁用'
        ])->default(0)->required();

        return $form;
    }
}
