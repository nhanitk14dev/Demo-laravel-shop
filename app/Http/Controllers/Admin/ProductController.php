<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\ProductRepository;
use App\Repositories\ProductCategoryRepository;
use App\Helper\Breadcrumb;
use App\Models\Products;

class ProductController extends Controller
{
    protected $product;
    protected $category;
    
    public function __construct(ProductRepository $product, ProductCategoryRepository $category )
    {
        $this->product = $product;
        $this->category = $category;
    }
    public function index()
    {
        Breadcrumb::title(trans('admin_product.title'));
        
        return view('admin.product.index');

        $categories = $this->category->getCategories(0, true);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Breadcrumb::title(trans('admin_product.create'));

        $tree = $this->category->arrTreeCategories(0);

        $categories = [];//$this->product_category->getCategories(0);

        $out_put_categories = $this->category->outTreeCategoryRadioCheckbox($tree, $type = 'checkbox', $list_id = [], $disable_id = [], $root = false);

        return view('admin.product.create_edit', compact('out_put_categories','categories'));
    }

    public function datatable()
    {

        $data = $this->product->datatable();

        return Datatables::of($data)
           
            ->addColumn(
                'action', function ($data) {
                return view('admin.layouts.partials.table_button')->with(
                    [
                        'link_edit' => route('admin.product.edit', $data->id),
                        'link_delete' => route('admin.product.destroy', $data->id),
                        'id_delete' => $data->id
                    ]
                )->render();
            }
            )
            ->escapeColumns([])
            ->make(true);
    }
    public function store(Request $request)
    {

        $input = $request->all();
        
        $this->product->store($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_product.product')]));

        return redirect()->route('admin.product.index');
    }

    
    public function show($id)
    {
        
    }

    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
