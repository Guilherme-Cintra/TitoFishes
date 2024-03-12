<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fish;

class Category extends Model
{
    protected $table = 'table_category';
    use HasFactory;

    protected $fillable = ['name'];

    public function fishes(){
        return $this->belongsToMany(Fish::class, 'table_fish_category');
    }

}
