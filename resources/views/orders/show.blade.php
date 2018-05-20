<!DOCTYPE html>
<html>
    <head>
    <title>Show Order: {{ $order->id }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="{{ URL::to('orders') }}">Show all Orders</a></li>
                <li><a href="{{ URL::to('orders/create') }}">Create a new Order</a></li>
            </ul>
        </nav>
        <h1>Showing details about Order# {{ $order->id }}</h1>
        <p>Order ID: {{ $order->id }}</p>
        <p>Staff ID: {{ $order->staff_id }}</p>
        <p>Customer ID: {{ $order->customer_id }}</p>
        <p>Menu ID: {{ $order->menu_id }}</p>
        
    </div>
    </body>
</html>