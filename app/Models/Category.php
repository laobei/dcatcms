<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Dcat\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, HasDateTimeFormatter, ModelTree;

    protected $fillable = [
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
        'template_page'
    ];

    public function getBannerAttribute($banner)
    {
        return $this->getImage($banner);
    }

    protected $parentColumn = 'pid';

    protected $orderColumn = 'sort';

    protected $titleColumn = 'title';
}
