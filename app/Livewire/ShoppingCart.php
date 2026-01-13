<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\OrderItem;
use App\Jobs\SendLowStockAlert; 
use Illuminate\Support\Facades\DB;

class ShoppingCart extends Component
{
    public function checkout()
    {
        if ($this->cartItems->isEmpty()) {
            return;
        }

        DB::transaction(function () {
            
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => $this->totalPrice,
            ]);

            foreach ($this->cartItems as $item) {
                // Create Order Item
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);

                $item->product->decrement('stock_quantity', $item->quantity);

                // CHECK REQUIREMENT: Low Stock Notification
                if ($item->product->fresh()->stock_quantity < 5) {
                    SendLowStockAlert::dispatch($item->product);
                }
            }

            CartItem::where('user_id', Auth::id())->delete();
        });

        session()->flash('message', 'Order placed successfully!');
        $this->dispatch('cart-updated');
        
        return redirect()->route('dashboard');
    }

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