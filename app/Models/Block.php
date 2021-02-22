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

    public function getThumbAttribute($thumb)
    {
        if (Str::contains($thumb, '//')) {
            return $thumb;
        }

        return Storage::disk('public')->url($thumb);
    }
}
