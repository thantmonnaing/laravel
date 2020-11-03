<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('brand.create');
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

        //validation
        $request->validate([
            'name' => 'required|max:50',
            'photo' => 'required|mimes:jpeg,jpg,png',
        ]);

        //if file include, file uploade
            if($request->file()){

                $filename = time().'_'.$request->photo->getClientOriginalName();
                $filepath = $request->file('photo')->storeAS('brandimg', $filename, 'public');

                $path = '/storage/'.$filepath;
            }

        //store
            $brand = new Brand;
            $brand->name = $request->name;
            $brand->photo = $path;
            $brand->save();    // use ORM

        //redirect
            return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $brand = Brand::find($id);   //only one row
        return view('brand.show',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $brand = Brand::find($id);
        return view('brand.edit',compact('brand'));
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
        // dd($request);

        $request->validate([
            'name' => 'required|max:50',
            'photo' => 'sometimes|required|mimes:jpeg, jpg, png',
            'oldphoto' => 'required'
        ]);

        //if file include, file uploade
            if($request->file()){

                //delete old photo

                unlink(public_path($request->oldphoto));

                $filename = time().'_'.$request->add_newphoto->getClientOriginalName();
                $filepath = $request->file('add_newphoto')->storeAS('brandimg', $filename, 'public');

                $path = '/storage/'.$filepath;
            }else{
                $path = $request->oldphoto;
            }

        //store
            $brand = Brand::find($id);
            $brand->name = $request->name;
            $brand->photo = $path;
            $brand->save();    // use ORM

        //redirect
            return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        unlink(public_path($brand->photo));
        $brand->delete();

        return redirect()->route('brand.index');
    }
}
