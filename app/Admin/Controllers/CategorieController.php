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
    public function grid()
    {
        $grid = new Grid(new Categorie());

        return $grid;
    }

    public function detail($id)
    {
        $show = new Show($id, CategorieModel::findOrFail($id));

        return $show;
    }

    public function form()
    {
        $form = new Form(new Categorie());

        return $form;
    }
}
