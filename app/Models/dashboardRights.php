<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dashboardRights extends Model
{
    protected $fillable = ["view", "edit", "user_id", "dashboard_id"];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function Dashboards()
    {
        return $this->belongsTo(Dashboards::class);
    }
}
