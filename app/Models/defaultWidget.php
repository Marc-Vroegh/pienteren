<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class defaultWidget extends Model
{
    use hasFactory;
    protected $fillable = ['title', 'icon', 'value', 'unit'];
    public $timestamps = false;  
}
