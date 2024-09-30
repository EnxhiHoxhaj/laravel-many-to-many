<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoriesRequest;
use App\Functions\Helper;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories= Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriesRequest $request)
    {
        $exists= Category::where('name', $request->name)->first();
        if(!$exists){
            $data= $request->all();
            $data['slug'] = Helper::generateSlug($data ['name'], Category::class);
            $category= Category::create($data);
            return redirect()->route('admin.categories.index')->with('succes', 'Nuova categoria inserita correttamente');
        }else{
            return redirect()->route('admin.categories.index')->with('error', 'Categoria già presente nell\'elenco');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.index', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriesRequest  $request, Category $category)
    {
        $data = $request->all();
        if($data['name'] === $category->name){
            $data ['slug']= $category->slug;
        } else {
            $data['slug'] = Helper::generateSlug($data['name'], Category::class);
        }
        $category->update($data);
        return redirect()->route('admin.categories.index', $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('delete', 'La categoria '. $category->name. ' è stata eliminata');
    }

    public function categoryPost(){
        $categories= Category::all();
        return view('admin.categories.categoryPost', compact('categories'));
    }
}
