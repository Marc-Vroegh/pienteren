<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataBox extends Model
{
    protected $fillable = ["email", "temp", "lvh", "ppm", "db", "lumen"];
    public $timestamps = false;
    use HasFactory;
}
