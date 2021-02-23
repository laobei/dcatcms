<?php

namespace App\Admin\Repositories;

use Dcat\Admin\Repositories\EloquentRepository;
use App\Models\Category as CategorieModel;

class Category extends EloquentRepository
{
    protected $eloquentClass = CategorieModel::class;
}
