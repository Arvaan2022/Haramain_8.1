<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoLink extends Model
{
    use HasFactory,SoftDeletes;
    protected $table      = "haramain_videos_link";
    protected $primaryKey = "id";
}
