<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imaam extends Model
{
    use  HasFactory, SoftDeletes;
    protected $primaryKey = 'imaam_id';
    protected $table = 'imaams';
}
