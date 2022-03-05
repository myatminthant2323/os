<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Item;
use App\Order;

class FrontendController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('checkout');
    }


    public function home($value='')
    {
    	$items = Item::all()->take(4);
    	// dd($items);
    	return view('frontend.home',compact('items'));
    }

    // itemController -> show နဲ့တူ
    public function itemdetail($item)
    {
    	$item = Item::find($item);
    	return view('frontend.detail',compact('item'));
    }

    public function cart()
    {
    	return view('frontend.cart');
    }

    public function checkout(Request $request)
    {
        $arr = json_decode($request->data);
        // dd($arr->product_list);
        $list = $arr->product_list;
        $total = 0;
        foreach ($list as $row) {
            $subtotal = $row->price * $row->quantity;
            $total += $subtotal;
        }

        $order = new Order;
        $order->orderdate = date('Y-m-d');
        $order->voucherno = uniqid();
        $order->total = $total;
        $order->note = 'Note Here';
        $order->status = 0;
        $order->user_id = Auth::id();;  // auth id

        $order->save();



        // insert into item_order
        foreach ($list as $row) {
            $order->items()->attach($row->id,['qty' => $row->quantity]);
        }

        return 'Your Order is sucessful!';
    }

}
