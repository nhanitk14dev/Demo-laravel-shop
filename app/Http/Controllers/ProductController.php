<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\ProductCategoryRepository;

class ProductController extends Controller
{
	protected $product;
    protected $category;

    public function __construct( ProductRepository $product, 
            ProductCategoryRepository $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function index()
    {
        //$slide = Slide::all();

        $products = $this->product->listProductNew($is_new = false);

    	return view('frontend.product.index', compact('products'));
    }

    public function show()
    {
    	return view('frontend.product.partials.show');
    }

    public function compare()
    {
        return view('frontend.product.partials.compare');
    }
}
