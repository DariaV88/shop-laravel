<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    use HasFactory;

    protected $table = 'skus';
    protected $guarded = false;

    public function products() {
        return $this->belongsTo(Product::class);
    }

    public function propertyOptions() {
        return $this->belongsToMany(PropertyOption::class, 'sku_property_option')->withTimestamps();
    }
}
