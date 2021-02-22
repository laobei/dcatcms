<?php

namespace App\Admin\Repositories;
use App\Models\News as NewsModel;

use Dcat\Admin\Repositories\EloquentRepository;

class News extends EloquentRepository
{
    protected $eloquentClass = NewsModel::class;
}
