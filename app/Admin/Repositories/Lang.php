<?php

namespace App\Admin\Repositories;
use App\Models\Lang as LangModel;

use Dcat\Admin\Repositories\EloquentRepository;

class Lang extends EloquentRepository
{
    protected $eloquentClass = LangModel::class;
}
