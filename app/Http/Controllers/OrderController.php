<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\MenuItem;

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
        return View::make('orders.create');
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
        $order->menu_id = Input::get('menu_id');
    
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
        return View::make('orders.show')
            ->with('order', $order)
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
        $order->menu_items()->attach(Input::get('menu_item_id'));
        $order->save();

        Session::flash('message', 'Item added to order!');
        return Redirect::to('orders/' . $order->id);
        //return View::make('orders.show')
        //    ->with('order', $order)
        //    ->with('menu_items', $menu_items);
    }

    public function removeMenuItem($id)
    {
        // todo
    }
}
