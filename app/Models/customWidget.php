<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomWidget extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'default_widget_id', 'name', 'color', 'box', 'icon', 'position'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
