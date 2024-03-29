<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [ 'price', 'quantity'];
    use HasFactory;
    public function cart(){
        return $this->belongsTo('App\Models\Cart');
    }
}