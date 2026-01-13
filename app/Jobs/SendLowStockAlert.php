<?php

namespace App\Jobs;

use App\Models\Product;
use App\Mail\LowStockEmail; 
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail; 
class SendLowStockAlert implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Product $product;
    public string $email;

    public function __construct(Product $product, string $email)
    {
        $this->product = $product;
        $this->email = $email;
    }

    public function handle(): void
    {
        Mail::to($this->email)
            ->send(new LowStockEmail($this->product));
    }
}
