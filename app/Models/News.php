<?php

namespace App\Models;

use Dcat\Admin\Models\Administrator;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory, HasDateTimeFormatter;

    protected $fillable = [
        'title',
        'file_name',
        'lang',
        'seo_title',
        'keywords',
        'description',
        'content',
        'target',
        'thumb',
        'author',
        'is_top',
        'status'
    ];

    public function getThumbAttribute($thumb)
    {
        return $this->getImage($thumb);
    }

    public function admin()
    {
        return $this->belongsTo(Administrator::class, 'author', 'id');
    }
}
