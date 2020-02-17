<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class Notification extends Model
{
    protected $fillable = [
        'title', 'description'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class,'notifications_categories');
    }
}
