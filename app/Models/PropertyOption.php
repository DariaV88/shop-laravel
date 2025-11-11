<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyOption extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'property_options';
    protected $guarded = false;

    public function property() {
        return $this->belongsTo(Property::class, 'property_product');
    }

    public function skus() {
        return $this->belongsToMany(Sku::class);
    }
}
