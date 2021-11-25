<?php

namespace App\Http\Controllers\Web;

use App\Models\Partner;
use App\Models\PartnerCategory;
use Illuminate\Http\Request;
use App\Http\Requests\PartnerCategoryStoreRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;



class PartnerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partnerCategories = (count(PartnerCategory::all()) > 0 ) ? PartnerCategory::all() : [];
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
    public function store(PartnerCategoryStoreRequest $request)
    {

        $category = PartnerCategory::firstOrCreate(
            ['name' => $request->name],
            ['name'      => $request->name, 
             'slug'      => Str::slug($request->name, '-'),
             'active'    => $request->active == 'on' ? 1 : 0,
             'parent_id' => $request->parent_id ,
            ]
        );

        return back()->with(['message' => 'Categoria criada com sucesso!', 'alert' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show(PartnerCategory $Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit(PartnerCategory $Category)
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
    public function update(Request $request, PartnerCategory $category)
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
    public function destroy(PartnerCategory $category)
    {
        if($category) {
            $category->delete();
        }
        return redirect()->route('category.index')->with(['message' => 'Categoria removida com sucesso!', 'alert' => 'alert-success']);
    }
}
