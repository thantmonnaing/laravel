<?php

namespace App\Http\Controllers;

use App\Item;
use App\Subcategory;
use App\Category;
use App\Brand;
use Illuminate\Http\Request;
// use Illuminate\Support\Collection;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        $brands = Brand::all();
        return view('item.index',compact('items', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        return view('item.create',compact('categories', 'subcategories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // $random = mt_rand(10000, 99999);
        // dd($random);

        //validation
        $request->validate([
            'name' => 'required|max:50',
            'photo' => 'required|mimes:jpeg,jpg,png',
            'price' => 'required',
            'brand' => 'required',
            'subcategory' =>'required'
        ]);

        //if file include, file uploade
            if($request->file()){

                $filename = time().'_'.$request->photo->getClientOriginalName();
                $filepath = $request->file('photo')->storeAS('itemimg', $filename, 'public');

                $path = '/storage/'.$filepath;
            }

        //store
            // $random = mt_rand(10000, 99999);

            $item = new Item;
            $item->codeno = uniqid();
            $item->name = $request->name;
            $item->photo = $path;
            $item->price = $request->price;
            $item->discount = $request->discount;
            $item->description = $request->description;
            $item->brand_id = $request->brand;
            $item->subcategory_id = $request->subcategory;
            $item->save();    // use ORM

        //redirect
            return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('item.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        return view('item.edit',compact('categories', 'item', 'subcategories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        // dd($request);

        $request->validate([
            'codeno' => 'required',
            'name' => 'required|max:50',
            'photo' => 'sometimes|required|mimes:jpeg, jpg, png',
            'oldphoto' => 'required',
            'price' => 'required',
            'brand' => 'required',
            'subcategory' =>'required'
        ]);

        //if file include, file uploade
            if($request->file()){

                unlink(public_path($request->oldphoto));

                $filename = time().'_'.$request->add_newphoto->getClientOriginalName();
                $filepath = $request->file('add_newphoto')->storeAS('itemimg', $filename, 'public');

                $path = '/storage/'.$filepath;
            }else{
                $path = $request->oldphoto;
            }

        //store
            $item->codeno = $request->codeno;
            $item->name = $request->name;
            $item->photo = $path;
            $item->price = $request->price;
            $item->discount = $request->discount;
            $item->description = $request->description;
            $item->brand_id = $request->brand;
            $item->subcategory_id = $request->subcategory;
            $item->save();    // use ORM

        //redirect
            return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        unlink(public_path($item->photo));
        $item->delete();
        return redirect()->route('item.index');
    }

    public function filterCategory(Request $request){
        $cid = $request->cid;
        $subcategories = Subcategory::where('category_id',$cid)->get();
        return $subcategories;
    }
}
