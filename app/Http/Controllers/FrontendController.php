<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Subcategory;

class FrontendController extends Controller
{
	public function home($value='')
	{
		$items = Item::all();
		return view('frontend.mainpage',compact('items'));
	}

	public function signin($value='')
	{
		return view('frontend.login');
	} 

	public function signup($value='')
	{
		return view('frontend.register');
	}  

	public function itemdetail($id)
	{
		$item = Item::find($id);
		return view('frontend.item_detail',compact('item'));
	} 

	public function itemsbysubcategory($id)
	  {
	    $mysubcategory = Subcategory::find($id);
	    return view('frontend.itemsbysubcategory',compact('mysubcategory'));
	  }

	public function cart($value='')
	{
		return view('frontend.cart');
	}  	
}
