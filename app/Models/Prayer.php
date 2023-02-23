<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prayer extends Model
{
    use  HasFactory, SoftDeletes;
    protected $primaryKey = 'prayer_id';
    protected $table = 'prayer_times';
}
