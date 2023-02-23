<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GpsLocationSubHeadings extends Model
{
    use  HasFactory, SoftDeletes;
    protected $primaryKey = 'gps_sub_heading_id';
    protected $table = 'gps_location_sub_headings';
 
}
