<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        $categories = Category::all();
        // dd($items);
        return view('backend.subcategories.index',compact('categories','subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.subcategories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
        ]);

        // File Upload
        
        // Store Data
        $subcategory = new Subcategory;
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;

        $subcategory->save();


        $status = 1;
        // Redirect
        return redirect()->route('subcategories.index',compact('status'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.subcategories.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = Subcategory::find($id);
        $categories = Category::all();
        // dd($item);
        return view('backend.subcategories.edit',compact('categories','subcategory'));
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
        $request->validate([
            'name' => 'required',
            // 'photo' => 'required',
            // may be present or absent
            'category' => 'required',

        ]);

        
        // File Upload
        

        // Update Data
        $subcategory = Subcategory::find($id);
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;

        $subcategory->save();

        $status = 2;

        // Redirect
        return redirect()->route('subcategories.index',compact('status'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);

        $subcategory->delete();

        $status = 3;
        return redirect()->route('subcategories.index',compact('status'));
    }
}
