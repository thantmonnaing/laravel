<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Subcategory;
use App\Brand;

class FrontendController extends Controller
{
	public function home($value='')
	{
		$items = Item::all();
		$brands = Brand::all();
		$discounts = 0;
		$discounts_items = array();
		foreach ($items as $row) {
            if($row->discount !='' && $row->discount > 0 ){
            	array_push($discounts_items,$row);
            }
        }
		return view('frontend.mainpage',compact('items','brands','discounts_items'));
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

	public function itemsbybrand($id)
	  {
	  	$mybrand = Brand::find($id);
	    $myitems = Item::where('brand_id',$id)->get();
	    return view('frontend.itemsbybrand',compact('mybrand','myitems'));
	  }  

	public function cart($value='')
	{
		return view('frontend.cart');
	} 


}
