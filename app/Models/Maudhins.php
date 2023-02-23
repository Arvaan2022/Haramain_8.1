<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maudhins extends Model
{
    use  HasFactory, SoftDeletes;
    protected $primaryKey = 'maudhins_id';
    protected $table = 'maudhins';
}
