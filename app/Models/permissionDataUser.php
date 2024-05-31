<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permissionDataUser extends Model
{
    use HasFactory;
    protected $fillable = ["email", "temp", "lvh", "ppm", "db", "lumen"];
    public $timestamps = false;
}
