<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Fish extends Model
{
    protected $table = 'table_fishes';
    use HasFactory;

    protected $casts = [
        'items' => 'array'
    ];

    protected $fillable = ['name', 'description', 'price', 'stock', 'category', 'species', 'image'];

    public function categories(){
        return $this->belongsToMany(Category::class, 'table_fish_category');
    }

    protected static function booted()
    {
        static::deleting(function ($fish) {
            $fish->categories()->detach();
        });
    }
}
