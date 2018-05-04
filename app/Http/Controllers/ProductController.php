<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Repository\ProductRepository;

class ProductController extends Controller
{
	protected $product;

	/*public function __construct(ProductRepository $product)
	{
		$this->product = $product;
	}*/
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
