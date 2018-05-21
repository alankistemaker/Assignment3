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
        <table class="table table-striped tabled-bordered">
            <thead>
            <tr>
                <th>OrderID</th>
                <th>StaffID</th>
                <th>Staff Name</th>
                <th>CustomerID</th>
                <th>MenuID</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->staff_id }}</td>
                <td>{{ $order->staff->name }}</td>
                <td>{{ $order->customer_id }}</td>
                <td>{{ $order->menu_id }}</td>
            </tr>
            </tbody>
        </table>
        <h2>Menu items belonging to order #{{ $order->id }}</h2>
        <table class="table table-striped tabled-bordered">
            <thead>
                <tr>
                    <th>Menu Item ID</th>
                    <th>Menu Item</th>
                    <th>Description</th>
                    <th>Cost</th>
                    <th>Price</th>
                    <th>Menu</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->menu_items as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->item_description }}</td>
                    <td>{{ $value->cost }}</td>
                    <td>{{ $value->price }}</td>
                    <td>{{ $value->menu_id }}</td>
                    <td>            
                     <a class="btn btn-small btn-success" href="{{ URL::to('removemenuitemfromorder/' . $order->id . '/' . $value->id) }}">Delete</a>
                     <!-- Show the menu item (uses the show method found at GET /menuitems/{id} -->                 
                     <a class="btn btn-small btn-success" href="{{ URL::to('menuitems/' . $value->id) }}">Show </a> 

                     <!-- Edit this category (uses the edit method found at GET /categories/{id}/edit -->                 
                     <a class="btn btn-small btn-info" href="{{ URL::to('menuitems/' . $value->id . '/edit') }}">Edit </a> 
                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <h4>Add Items to order #{{ $order->id }}</h4>
         
         {{ Html::ul($errors->all()) }}
         {{ Form::model($order, array('route' => array('addmenuitemtoorder', $order->id), 'method' => 'PUT')) }}
         <div>
            {{ Form::label('menu_item', 'Menu Item') }}
            {{ Form::select('menu_item_id', $menu_items, null, array('class' => 'form-control')) }}
         </div>
         {{ Form::submit('Add item to order', array('class' => 'btn btn-primary')) }} 
         {{ Form::close() }} 
         </div>
    </div>
    </body>
</html>