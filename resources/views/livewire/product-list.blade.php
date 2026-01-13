<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        @if (session()->has('message'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4">
                <p class="text-sm text-green-700">
                    {{ session('message') }}
                </p>
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-4 flex flex-col">
                    
                    <div class="h-40 bg-gray-200 dark:bg-gray-700 rounded-md mb-4 flex items-center justify-center">
                        <span class="text-gray-400 dark:text-gray-500 text-sm">No Image</span>
                    </div>

                    {{-- Product Info --}}
                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white truncate">
                            {{ $product->name }}
                        </h3>
                        <div class="flex justify-between items-center mt-1">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                Stock: {{ $product->stock_quantity }}
                            </span>
                        </div>
                    </div>

                    {{-- Price & Button --}}
                    <div class="mt-auto flex items-center justify-between">
                        <span class="text-xl font-bold text-gray-900 dark:text-white">
                            ${{ number_format($product->price, 2) }}
                        </span>
                        
                        <button 
                            wire:click="addToCart({{ $product->id }})" 
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm font-medium transition-colors"
                        >
                            Add to Cart
                        </button>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</div>