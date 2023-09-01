<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;

class Form extends Model
{
    use HasFactory;
    use Sluggable;


    protected $fillable = [
        'slug','name', 'data', 'active'
    ];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => Str::reverse($this->name)
            ]
        ];
    }
}
