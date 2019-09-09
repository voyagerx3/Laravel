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
        //
        $categories = Category::orderby('id','desc')->paginate(5);
        return view('categories.index')->with(['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(CreateCategoryRequest $request)
    {
         
        $category = new Category;
        $category->fill($request->only('name', 'description'));
        $category->user_id = $request->user()->id;
        $category->save();
        session()->flash('message', 'Category Created!');
        return redirect()->route('categories_path');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        return view('categories.show')->with(['category'=>$category]);//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
         if($category->user_id != \Auth::user()->id) {
            return redirect()->route('categories_path');
        }
         
        return view('categories.edit')->with(['category'=>$category]);
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
           
        $category->update(
            $request->only('name','description')
        );
        session()->flash('message', 'category Updated!');
        return redirect()->route('category_path', ['category' => $category->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete(Category $category)
    {
        //
        if($category->user_id != \Auth::user()->id) {
            return redirect()->route('categories_path');
        }
        $category->delete();
        session()->flash('message', 'Category Deleted!');
        return redirect()->route('categories_path');
    }
}
