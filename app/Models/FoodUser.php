<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodUser extends Model
{
    use HasFactory;

    protected $table = 'food_user';

    protected $fillable = [
        'food_id',
        'user_id',
    ];


}
