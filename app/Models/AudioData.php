<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AudioData extends Model
{
    use HasFactory,SoftDeletes;

    protected $primaryKey = 'audio_id';
    protected $table = 'audio_data';

}
