<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Property extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'properties';
    protected $guarded = false;

    public function propertyOptions() {
        return $this->hasMany(PropertyOption::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
