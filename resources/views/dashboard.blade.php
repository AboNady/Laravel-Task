<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Shop Products') }}
            </h2>
            
            <a href="{{ route('cart') }}" class="text-blue-600 hover:text-blue-800 font-bold">
                View Cart &rarr;
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:product-list />
        </div>
    </div>
    
</x-app-layout>