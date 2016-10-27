<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use CodeCommerce\Category;
use CodeCommerce\ProductImage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    private $productModel;
    
    public function __construct(Product $productModel) {        
        $this->productModel = $productModel;
    }
    
    public function index()
    {
        $products = $this->productModel->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ProductRequest $request)
    {
        $input = $request->all();
        
        $product = $this->productModel->fill($input);
        
        $product->save();
        
        return redirect()->route('admin.products.index');
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
    public function edit($id, Category $category)
    {
        $categories = $category->lists('name', 'id');
        $product = $this->productModel->find($id);
        
        return view('admin.products.edit', compact('product', 'categories')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ProductRequest $request, $id)
    {
        $this->productModel->find($id)->update($request->all());
        
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productModel->find($id)->delete();
        
        return redirect()->route('admin.products.index');
    }
    
    public function images($id) {
        
        $product = $this->productModel->find($id);
        
         return view('admin.products.images', compact('product'));
    }
    
    public function createImage($id) {
        
        $product = $this->productModel->find($id);
        
         return view('admin.products.create_image', compact('product'));
    }
    
    public function storeImage(Request $request, $id, ProductImage $productImage) {
        
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        
        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);
        
        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));
        
        return redirect()->route('admin.products.images', ['id'=>$id]);
    }
}
