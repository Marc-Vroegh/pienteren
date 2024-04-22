<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customWidget extends Model
{
    protected $fillable = ["email", "toCloneDiv", "color", "name", "source", "clonedDiv"];
    public $timestamps = false;
    use HasFactory;
}
