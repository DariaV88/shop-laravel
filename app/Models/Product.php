<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';
    protected $guarded = false;

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

     public function skus() {
        return $this->hasMany(Sku::class);
    }

    public function properties() {
        return $this->belongsToMany(Property::class, 'property_product')->withTimestamps();
    }


    public function getTotalPrice() {
        if(!is_null($this->pivot)) {
            return $this->price * $this->pivot->count;
        }
        return $this->price;
    }

    public function isHit() {
        return $this->hit === 1;
    }

    public function isNew() {
        return $this->new === 1;
    }

    public function isAvailable() {
        return  !$this->trashed() && $this->count > 0;
    }
}
