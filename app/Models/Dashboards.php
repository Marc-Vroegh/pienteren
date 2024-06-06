<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dashboards extends Model
{
    protected $fillable = ["name", "user_id"];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dashboardRights(): HasMany
    {
        return $this->hasMany(dashboardRights::class, 'dashboard_id');
    }

    public function CustomWidgets(): HasMany
    {
        return $this->hasMany(CustomWidget::class, 'Dashboards_id');
    }
}
