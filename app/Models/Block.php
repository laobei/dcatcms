<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Block extends Model
{
    use HasFactory, HasDateTimeFormatter;

    protected $fillable = [
        'name',
        'title',
        'description',
        'thumb',
        'content',
        'status'
    ];

    public function getThumbAttribute($thumb)
    {
        return $this->getImage($thumb);
    }
}
