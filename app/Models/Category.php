<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
 
class Category extends Model
{
    use  HasFactory, SoftDeletes ,HasRoles;
    protected $primaryKey = 'category_id';
    protected $table = 'category';
}
