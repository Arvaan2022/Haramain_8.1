<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GpsLocationHeadings extends Model
{
    use  HasFactory, SoftDeletes;
    protected $primaryKey = 'gps_heading_id';
    protected $table = 'gps_location_headings';
}
