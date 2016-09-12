<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;

use CodeCommerce\Category;

class WelcomeController extends Controller
{
    private $categories;
    
    public function __construct(Category $category) {
        $this->middleware('guest');
        $this->categories = $category;
    }
    
    public function index() {
        return view('welcome');        
    }
    
    public function example() {        
        $categories = $this->categories->all();
        return view('example', compact('categories'));        
    }
}
