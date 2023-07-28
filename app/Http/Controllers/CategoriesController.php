<?php

namespace App\Http\Controllers;

use App\Models\product_categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function showCatAll(){
        $categories = product_categories::get();
        return response()->json($categories);
    }
    public function showCatByTypes(string $parent_id){
        
        $categories = product_categories::where('product_type_id', $parent_id)->get();
        switch ($categories){
            case true:
                return response()->json($categories);
            default:
                return "Không tìm thấy danh mục";
        }
    }
    
    


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
