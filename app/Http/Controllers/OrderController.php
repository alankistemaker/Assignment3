<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\MenuItem;
use App\Menu;
use App\Staff;
use App\Customer;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Validator;
use Session;
use Redirect;

use App\Http\Requests\StoreOrder;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retrieve all the orders
        $orders = Order::all();

        // return the view with all the orders
        return View::make('orders.index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff = Staff::pluck('name', 'id');
        $customers = Customer::pluck('name', 'id');
        $menus = Menu::pluck('name', 'id');
        return View::make('orders.create')
            ->with('staff', $staff)
            ->with('customers', $customers)
            ->with('menus', $menus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrder $request)
    {
        // runs the validation code at Requests\StoreOrder
        $validated = $request->validated();

        $order = new Order;
        $order->staff_id = Input::get('staff_id');
        $order->customer_id = Input::get('customer_id');
        if (Input::get('takeaway') == 'Takeaway')
        {
            $order->takeaway = true;
        } else {
            $order->takeaway = false;
        }
        
    
        // add the menu items
        // the order must be created(saved) before any menu items can be attached
        $order->save();
        $order->menu_items()->attach(Input::get('menu_item'));
        $order->save();

        // redirect
        Session::flash('message', 'Successfully created Order');
        return Redirect::to('orders/')
            ->with('order', $order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu_items = MenuItem::pluck('name', 'id');
        $order = Order::find($id);
        $menus = Menu::all();
        return View::make('orders.show')
            ->with('order', $order)
            ->with('menus', $menus)
            ->with('menu_items', $menu_items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return View::make('orders.edit')
            ->with('order', $order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->staff_id = Input::get('staff_id');
        $order->customer_id = Input::get('customer_id');
        $order->menu_id = Input::get('menu_id');
        // add the menu items
        $order->menu_items()->attach(Input::get('menu_item'));
        $order->save();

        Session::flash('message', 'Order Updated');
        return Redirect::to('orders.show')
            ->with('order', $order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->menu_items()->detach();
        $order->delete();

        Session::flash('message', 'Order Deleted');
        return Redirect::to('orders');
    }

    public function addMenuItem($id)
    {
        $menu_items = MenuItem::pluck('name', 'id');
        $order = Order::find($id);
        $menus = Menu::all();
        foreach($menus as $menu => $value)
        {
            $order->menu_items()->attach( Input::get('menu' . $value->id) );
        }
        // $order->menu_items()->attach(Input::get('menu_item_id'));
        $order->save();

        Session::flash('message', 'Item added to order!');
        return Redirect::to('orders/' . $order->id);
        //return View::make('orders.show')
        //    ->with('order', $order)
        //    ->with('menu_items', $menu_items);
    }

    public function removeMenuItem($order_id, $menu_item_id)
    {
        // find the menuitem
        $menu_item = MenuItem::find( $menu_item_id );
        $order = Order::find( $order_id );

        $order->menu_items()->detach($menu_item);

        Session::flash('message', 'Item removed from order');
        return Redirect::to('orders/' . $order->id);
    }
}
