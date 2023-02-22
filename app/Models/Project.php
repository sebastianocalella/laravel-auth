<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'author',
        'slug',
        'title',
        'modification_date',
        'is_urgent',
        'description'
    ];

    /**
     * Get the route key for the model
     * 
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
