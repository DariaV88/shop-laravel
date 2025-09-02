<?php

namespace App\Observers;

class productObserver
{
    public function updating (Product $product) {

        $oldCount = $product->getOriginal('count');
        if($oldCount == 0 && $product->count > 0) {
            Subscription::sendEmailBySubscription($product);
        }
    }
}
