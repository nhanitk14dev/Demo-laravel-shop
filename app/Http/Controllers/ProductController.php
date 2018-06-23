<?php

namespace App\Http\Controllers;

use App\Helper\TranslateUrl;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Products;
use App\Models\ProductType;

class ProductController extends Controller
{

    protected $category;
    protected $product;

    public function __construct( ProductRepository $product,
            ProductCategoryRepository $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function index($is_new = false, $limit = 0)
    {
        //$slide = Slide::all();
        $product_new = $this->product->listProductNew($is_new = true, $limit = 8);//true = 1

        $product_promotion = $this->product->listProductPromotion();

        $product_other = $this->product->listProductNew($is_new = false);

    	return view('frontend.product.index', compact(
            'product_new',
            'product_promotion',
            'product_other'
        ));
    }

    public function show($slug)
    {
        $products = $this->product->findProductBySlug($slug);

    	return view('frontend.product.show', compact('products'));
    }

    public function about()
    {
        return view('frontend.page.about');
    }

    public function contact()
    {
        return view('frontend.page.contact');
    }

    public function faq()
    {
        return view('frontend.page.faq');
    }



}
