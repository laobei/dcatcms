<?php

namespace App\Admin\Repositories;

use Dcat\Admin\Repositories\EloquentRepository;
use App\Models\Banner as BannerModel;

class Banner extends EloquentRepository
{
    protected $eloquentClass = BannerModel::class;

    /**
     * 设置表格查询的字段，默认查询所有字段
     *
     * @return array
     */
    public function getGridColumns()
    {
        return [
            'id',
            'title',
            'description',
            'pic_url',
//            'title_color',
//            'description_color',
            'link_url',
            'position',
            'status',
//            'created_at',
//            'updated_at'
        ];
    }
}
