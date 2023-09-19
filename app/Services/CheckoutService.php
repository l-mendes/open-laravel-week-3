<?php

namespace App\Services;

use App\Enums\OrderStatusEnum;
use App\Models\Order;
use Database\Seeders\OrderSeeder;

class CheckoutService
{
    public function loadCart(): array
    {
        $cart = Order::query()
            ->with(['skus.product', 'skus.features'])
            ->where('status', OrderStatusEnum::CART)
            ->where(function ($query) {
                $query->where('session_id', session()->getId());
                if (auth()->check()) {
                    $query->orWhere('user_id', auth()->id());
                }
            })
            ->first();

        if (!$cart && app()->isLocal()) {
            $seed = new OrderSeeder();
            $seed->run(session()->getId());

            return $this->loadCart();
        }

        return $cart->toArray();
    }
}
