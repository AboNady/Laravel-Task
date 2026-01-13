<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Mail\DailySalesReport;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendDailySalesReport extends Command
{
    // The name you type in terminal to run this
    protected $signature = 'app:send-daily-sales-report';

    protected $description = 'Send a daily email report of all sales to the admin';

    public function handle()
    {
        $today = Carbon::today();
        
        $orders = Order::whereDate('created_at', $today)->with('user')->get();
        
        $totalRevenue = $orders->sum('total_price');
        $dateString = $today->toFormattedDateString();

        Mail::to('admin@NadyTask.com')->send(
            new DailySalesReport($orders, $totalRevenue, $dateString)
        );
        
        $this->info('Daily report sent successfully!');
    }
}