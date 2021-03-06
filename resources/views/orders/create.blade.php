<!DOCTYPE html> 
<html>
   <head>
      <title>Create Order</title>
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
         <h1>Create an Order</h1>

         {{ Html::ul($errors->all()) }}
         {{ Form::open(array('url' => 'orders')) }}
         <div class="form-group">
            {{ Form::label('staff_id', 'Staff ID') }}         
            {{ Form::select('staff_id', $staff, null, array('class' => 'form-control')) }}     
         </div>
         <div class="form-group">
            {{ Form::label('customer_id', 'Customer ID') }}
            {{ Form::select('customer_id', $customers, null, array('class' => 'form-control')) }}
         </div>
         <div class="form-group">
            {{ Form::label('takeaway', 'Order Type') }}
            {{ Form::select('takeaway', ['Takeaway', 'Dine-in'], null, ['class' => 'form-control']) }}
         </div>

         {{ Form::submit('Create the Order!', array('class' => 'btn btn-primary')) }} 
         {{ Form::close() }} 
      </div>
   </body>
</html>