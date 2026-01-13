<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class ProductList extends Component
{
    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);

        // Check if user already has it in cart
        $cartItem = CartItem::where('user_id', Auth::id())
                            ->where('product_id', $productId)
                            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        }
        else
        {
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => 1
                ]);
        }

        // Dispatch event to update the Cart icon, and show a success message
        $this->dispatch('cart-updated'); 
        session()->flash('message', 'Added ' . $product->name . ' to cart!');
    }

    public function render()
    {
        return view('livewire.product-list', [
            'products' => Product::all()
        ]);
    }
}