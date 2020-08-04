<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class FrontendController extends Controller
{
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

}
