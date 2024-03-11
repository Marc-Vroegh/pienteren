<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataWidget extends Model
{
    protected $fillable = ["container", "widget", "email"];
    use HasFactory;
}
