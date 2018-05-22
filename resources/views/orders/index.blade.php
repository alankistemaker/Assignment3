<!DOCTYPE html> 
<html>
   <head>
      <title>Orders (Index)</title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
      <div class="container">
         <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
               <li><a href="{{ URL::to('orders') }}">View All Orders</a></li>
               <li><a href="{{ URL::to('orders/create') }}">Create an Order</a>     
            </ul>
         </nav>
         <h1>All Orders</h1>
         <!-- will be used to show any messages --> 
         @if (Session::has('message'))     
         <div class="alert alert-info">{{ Session::get('message') }}</div>
         @endif 
         <table class="table table-striped table-bordered">
            <thead>
               <tr>
                  <th>Order ID</th>
                  <th>Staff ID</th>
                  <th>Staff Name</th>
                  <th>Customer ID</th>
                  <th>Customer Name</th>
                  <th>Order Type</th>
                  <th>Created At</th>
                  <th>Last Updated</th>
               </tr>
            </thead>
            <tbody>
               @foreach($orders as $key => $value)         
               <tr>
               @php
               $message = "";

               if ($value->takeaway == 1)
               {
                   $message = "TAKEAWAY";
               } else {
                   $message = "DINE IN";
               }

               @endphp
                  <td>{{ $value->id }}</td>
                  <td>{{ $value->staff_id }}</td>
                  <td>{{ $value->staff->name }}</td>
                  <td>{{ $value->customer_id }}</td>
                  <td>{{ $value->customer->name }}</td>
                  <td>{{ $message }}</td>
                  <td>{{ $value->created_at }}</td>
                  <td>{{ $value->updated_at }}</td>
                  <!-- we will also add show, edit, and delete buttons -->             
                  <td>
                     <!-- delete the country (uses the destroy method DESTROY /country/{id} -->                 
                     {{ Form::open(array('url' => 'orders/' . $value->id, 'class' => 'pull-right')) }}
                     {{ Form::hidden('_method', 'DELETE') }}
                     {{ Form::submit('Delete this Order', array('class' => 'btn btn-warning')) }}
                     {{ Form::close() }}

                     <!-- Show the restaurant (uses the show method found at GET /countries/{id} -->                 
                     <a class="btn btn-small btn-success" href="{{ URL::to('orders/' . $value->id) }}">Show this Order</a>
                  </td>
               </tr>
               @endforeach     
            </tbody>
         </table>
      </div>
   </body>