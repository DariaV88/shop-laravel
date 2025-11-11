<?php

namespace App\Observers;

use App\Models\Product;

class productObserver
{
    public function updating (Product $product) {

        Log::info('Observer triggered on created: ', [$product]);

        $oldCount = $product->getOriginal('count');
        if($oldCount == 0 && $product->count > 0) {
            Subscription::sendEmailBySubscription($product);
        }
    }
}
