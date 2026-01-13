<!DOCTYPE html>
<html>
<head>
    <title>Daily Sales Report</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">
    
    <h2>📊 Daily Sales Report</h2>
    <p><strong>Date:</strong> {{ $date }}</p>
    
    <div style="margin-bottom: 20px; padding: 15px; background: #e3f2fd; border-radius: 5px;">
        <h3 style="margin: 0; color: #0d47a1;">Total Revenue: ${{ number_format($totalRevenue, 2) }}</h3>
        <p style="margin: 5px 0 0;">Total Orders: {{ $orders->count() }}</p>
    </div>

    @if($orders->isEmpty())
        <p>No sales were made today.</p>
    @else
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="padding: 10px; border: 1px solid #ddd; text-align: left;">Order ID</th>
                    <th style="padding: 10px; border: 1px solid #ddd; text-align: left;">Customer</th>
                    <th style="padding: 10px; border: 1px solid #ddd; text-align: right;">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td style="padding: 10px; border: 1px solid #ddd;">#{{ $order->id }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $order->user->name }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd; text-align: right;">${{ number_format($order->total_price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>