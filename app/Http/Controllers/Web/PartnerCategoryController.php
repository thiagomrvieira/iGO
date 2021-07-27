<?php

namespace App\Http\Controllers\Web;

use App\Models\Partner;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partnerCategories = (count(Category::all()) > 0 ) ? Category::all() : [];
        return view('backoffice-admin.partner.partner-categories')->with('partnerCategories', $partnerCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $request->active == 'on' ? $category->active = 1 : $category->active = 0;
        $category->save();

        return back()->with(['message' => 'Categoria criada com sucesso!', 'alert' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $Category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return back()->with(['message' => 'Categoria atualizada com sucesso!', 'alert' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category) {
            $category->delete();
        }
        return redirect()->route('category.index')->with(['message' => 'Categoria removida com sucesso!', 'alert' => 'alert-success']);
    }
}
