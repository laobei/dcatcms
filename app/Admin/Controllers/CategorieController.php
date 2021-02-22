<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Categorie;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Show;
use Illuminate\Http\Request;

class CategorieController extends AdminController
{
    protected $title = '栏目';

    protected function grid()
    {
        $grid = new Grid(new Categorie());

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show($id, new Categorie());

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Categorie());

        return $form;
    }
}
