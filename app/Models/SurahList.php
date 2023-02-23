<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurahList extends Model
{
    use  HasFactory, SoftDeletes;
    protected $primaryKey = 'surah_id';
    protected $table = 'surah_list';
}
