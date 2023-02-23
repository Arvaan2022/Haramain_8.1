<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryCategory extends Model
{
    use  HasFactory, SoftDeletes;
    protected $primaryKey = 'gallery_category_id';
    protected $table = 'gallery_category';
}
