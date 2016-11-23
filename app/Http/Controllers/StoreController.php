<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;

class StoreController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //No business rules at controller
        //$pFeatured = Product::where('featured', '=', 1)->get();
        $pFeatured = Product::featured()->get();
        $pRecommended = Product::recommended()->get();
        //dd($pFeatured);
        $categories = Category::all();
        return view('store.index', compact('categories', 'pFeatured', 'pRecommended'));
    }
    
    public function category($id) {
        $products = Product::ofCategory($id)->get();
        $categories = Category::all();
        $category = Category::find($id);
        return view('store.category', compact('categories', 'products', 'category'));
    }

    public function product($id) {
        $categories = Category::all();
        $product = Product::find($id);
        return view('store.product', compact('categories', 'product'));
    }
    
    public function tag($id) {
        $categories = Category::all();
        $tag = Tag::find($id);         
        return view('store.tag', compact('categories', 'tag'));
    }
}
