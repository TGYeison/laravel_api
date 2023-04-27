<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillabel = ['id', 'name_course', 'start_date', 'end_date'];

}
