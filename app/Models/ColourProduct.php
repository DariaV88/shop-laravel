<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColourProduct extends Model
{
    use HasFactory;

    protected $table = 'colour_products';
    protected $guarded = false;
}
