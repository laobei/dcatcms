<?php

namespace App\Admin\Repositories;

use App\Models\Block as BlockModel;
use Dcat\Admin\Repositories\EloquentRepository;

class Block extends EloquentRepository
{
    protected $eloquentClass = BlockModel::class;
}
