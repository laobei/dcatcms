<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory, HasDateTimeFormatter;

    protected $fillable = [
        'title',
        'description',
        'pic_url',
        'title_color',
        'description_color',
        'link_url',
        'position',
        'status'
    ];
}
