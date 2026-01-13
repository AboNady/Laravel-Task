<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
    
    @if($this->cartItems->isEmpty())
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg">Your cart is empty.</p>
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline mt-2 inline-block">
                Browse Products
            </a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($this->cartItems as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                {{ $item->product->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                ${{ number_format($item->product->price, 2) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                <div class="flex justify-center items-center space-x-2">

                                    <button wire:click="decrement({{ $item->id }})" class="bg-gray-200 px-2 py-1 rounded hover:bg-gray-300">-</button>
                                    
                                    <span class="w-8 text-center">{{ $item->quantity }}</span>
                                    
                                    <button wire:click="increment({{ $item->id }})" class="bg-gray-200 px-2 py-1 rounded hover:bg-gray-300">+</button>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-right font-bold text-gray-900 dark:text-white">
                                ${{ number_format($item->quantity * $item->product->price, 2) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                
                                <button wire:click="remove({{ $item->id }})" class="text-red-600 hover:text-red-900 text-sm">Remove</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Footer: Total & Checkout --}}
        <div class="mt-8 flex justify-end items-center border-t pt-4">
            <div class="text-right">
                <p class="text-lg text-gray-600">Total:</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                    ${{ number_format($this->totalPrice, 2) }}
                </p>
                
                
                <button 
                    wire:click="checkout" 
                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded shadow-lg transition transform hover:scale-105"
                >
                    Checkout Now
                </button>
            </div>
        </div>
    @endif
</div>