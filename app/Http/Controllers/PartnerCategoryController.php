<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\PartnerCategory;
use Illuminate\Http\Request;
use App\Http\Requests\PartnerCategoryStoreRequest;


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
        return view('backoffice.partner.partner-categories')->with('partnerCategories', $partnerCategories);
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
        $category = new PartnerCategory;
        $category->name = $request->name;
        $category->description = $request->description;
        $request->active == 'on' ? $category->active = 1 : $category->active = 0;
        $category->save();

        return back()->with(['message' => 'Categoria criada com sucesso!', 'alert' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PartnerCategory  $partnerCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PartnerCategory $partnerCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PartnerCategory  $partnerCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PartnerCategory $partnerCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PartnerCategory  $partnerCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PartnerCategory $category)
    {
        $category->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PartnerCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(PartnerCategory $category)
    {
        if($category) {
            $category->delete();
        }
        return redirect()->route('category.index');
    }
}
