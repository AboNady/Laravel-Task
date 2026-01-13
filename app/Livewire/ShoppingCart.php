<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class ShoppingCart extends Component
{
    public function getCartItemsProperty()
    {
        return CartItem::where('user_id', Auth::id())
                       ->with('product')
                       ->get();
    }
    public function getTotalPriceProperty()
    {
        return $this->cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
    }

    public function increment($id)
    {
        $item = CartItem::where('id', $id)->where('user_id', Auth::id())->first();
        if ($item && $item->product->stock_quantity > $item->quantity) {
            $item->increment('quantity');
        }
    }

    public function decrement($id)
    {
        $item = CartItem::where('id', $id)->where('user_id', Auth::id())->first();
        if ($item && $item->quantity > 1) {
            $item->decrement('quantity');
        }
    }

    public function remove($id)
    {
        CartItem::where('id', $id)->where('user_id', Auth::id())->delete();
        $this->dispatch('cart-updated'); 
    }

    #[On('cart-updated')] // Listener to refresh component
    public function render()
    {
        return view('livewire.shopping-cart');
    }
}