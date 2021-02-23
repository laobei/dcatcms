<?php

namespace App\Admin\Repositories;

use Dcat\Admin\Repositories\EloquentRepository;
use App\Models\Banner as BannerModel;

class Banner extends EloquentRepository
{
    protected $eloquentClass = BannerModel::class;
}
