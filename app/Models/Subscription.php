<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $table = 'subscriptions';
    protected $guarded = false;

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function scopeActiveByProductId($query, $productId) {
        return $query->where('status', 0)->where('product_id', $productId);
    }

    public static function sendEmailBySubscription(Product $product) {
        self::scopeActiveByProductId($product->id)->get();
    }
}
