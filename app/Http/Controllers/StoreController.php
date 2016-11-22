<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Product;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //No business rules at controller
        //$pFeatured = Product::where('featured', '=', 1)->get();
        $pFeatured = Product::featured()->get();
        $pRecommended = Product::recommended()->get();
        //dd($pFeatured);
        $categories = Category::all();
        return view('store.index', compact('categories', 'pFeatured', 'pRecommended'));
    }
    
    //old function using local scope and showing featured/recommended products
//    public function productsByCategory($id)
//    {
//        $pFeatured = Product::featured()->byCategory($id)->get();
//        $pRecommended = Product::recommended()->byCategory($id)->get();
//        $categories = Category::all();
//        return view('store.index', compact('categories', 'pFeatured', 'pRecommended')); 
//    }
    
    public function category($id)
    {
        $products = Product::ofCategory($id)->get();
        $categories = Category::all();
        $category = Category::find($id);
        return view('store.category', compact('categories', 'products', 'category')); 
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
