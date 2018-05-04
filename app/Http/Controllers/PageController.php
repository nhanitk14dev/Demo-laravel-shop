<?php

namespace App\Http\Controllers;

use App\Helper\TranslateUrl;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Products;
use App\Models\ProductType;

class PageController extends Controller
{

    protected $category;

    public function __construct( ProductRepository $product, 
            ProductCategoryRepository $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function pagehome()
    { 
    	return view('frontend.page.trangchu');
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
