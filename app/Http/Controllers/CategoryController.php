<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
                $filepath = $request->file('photo')->storeAS('categoryimg', $filename, 'public');

                $path = '/storage/'.$filepath;
            }

        //store
            $category = new Category;
            $category->name = $request->name;
            $category->photo = $path;
            $category->save();    // use ORM

        //redirect
            return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
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
                $filepath = $request->file('add_newphoto')->storeAS('categoryimg', $filename, 'public');

                $path = '/storage/'.$filepath;
            }else{
                $path = $request->oldphoto;
            }

        //store
            $category->name = $request->name;
            $category->photo = $path;
            $category->save();    // use ORM

        //redirect
            return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        unlink(public_path($category->photo));
        $category->delete();
        return redirect()->route('category.index');
    }
}
