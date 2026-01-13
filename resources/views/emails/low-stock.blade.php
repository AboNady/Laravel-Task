<!DOCTYPE html>
<html>
<head>
    <title>Low Stock Alert</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">
    
    <h2 style="color: #d9534f;">⚠️ Low Stock Warning</h2>
    
    <p>Hello Admin,</p>
    
    <p>The following product has dropped below the safety threshold:</p>
    
    <div style="border: 1px solid #ddd; padding: 15px; border-radius: 5px; background-color: #f9f9f9;">
        <p><strong>Product Name:</strong> {{ $product->name }}</p>
        <p><strong>Current Stock:</strong> <span style="color: red; font-weight: bold;">{{ $product->stock_quantity }}</span></p>
        <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
    </div>

    <p>Please restock immediately.</p>
    
    <p>Regards,<br>Your Store System</p>
</body>
</html>