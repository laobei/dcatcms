<?php

namespace App\Admin\Repositories;

use Dcat\Admin\Repositories\EloquentRepository;
use App\Models\Categorie as CategorieModel;

class Categorie extends EloquentRepository
{
    protected $eloquentClass = CategorieModel::class;
}
