<?php

namespace App\Admin\Repositories;

use Dcat\Admin\Repositories\EloquentRepository;
use App\Models\Categorie as CategorieModel;

class Categorie extends EloquentRepository
{
    protected $eloquentClass = CategorieModel::class;

    /**
     * 设置表格查询的字段，默认查询所有字段
     *
     * @return array
     */
    public function getGridColumns()
    {
        return [
            'id',
            'pid',
            'name',
            'module',
            'file_name',
            'lang',
            'seo_title',
            'keywords',
            'description',
            'content',
            'target',
            'link_url',
            'banner',
            'icon',
            'is_show',
            'status',
            'nofollow',
            'module_type',
            'next_nav',
            'sort',
            'template_index',
            'template_list',
            'template_detail',
            'template_page',
            'created_at',
            'update_at'
        ];
    }
}
