<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;

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
    	return view('frontend.product.index');
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
