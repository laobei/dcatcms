<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory, HasDateTimeFormatter;

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
}
