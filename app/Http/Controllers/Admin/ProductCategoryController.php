<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Models\ProductType;
use App\Repositories\ProductCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;


class ProductCategoryController extends Controller
{
    protected $product;
    protected $category;

    public function __construct(ProductCategoryRepository $category )
    {
        $this->category = $category;
    }
    
    public function index()
    {
        Breadcrumb::title(trans('admin_product_category.title'));

        $tree = $this->category->arrTreeCategories(0);

        $out_put = $this->category->outTreeCategorySortTable($tree);

        return view('admin.product_category.index', compact('out_put'));
    }

    
    public function create()
    {
        Breadcrumb::title(trans('admin_product_category.create_category'));

        $tree = $this->category->arrTreeCategories(0);

        $out_put = $this->category->outTreeCategoryRadioCheckbox($tree, $type = 'radio', $list_id = [], $disable_id = [], $root = true);

        return view(
            'admin.product_category.create_edit', compact(
                'out_put'
            )
        );
        
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $this->category->store($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_product_category.category')]));

        return redirect()->route('admin.product_category.index');
    }

    public function edit($id)
    {
        Breadcrumb::title(trans('admin_product_category.edit_category'));

        $category = $this->category->find($id);

        $styles = ProductType::getStyles();

        $disable_ids = [
            $id
        ];

        $this->category->getAllChildrenIds($disable_ids, $id);

        $tree = $this->category->arrTreeCategories(0);

        $out_put = $this->category->outTreeCategoryRadioCheckbox($tree, $type = 'radio', $list_id = [$category->parent_id], $disable_ids, $root = true);

       
        return view(
            'admin.product_category.create_edit', compact(
                'out_put',
                'styles',
                'category'
            )
        );
    }

    
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->category->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_product_category.category')]));

        return redirect()->back();
    }

    
    public function destroy($id)
    {
        $this->category->destroy($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_product_category.category')]));

        return redirect()->back();
    }

    public function sort(Request $request)
    {
        $positions = $request->input('positions');
        $this->category->sort($positions);
        return restSuccess('Success');
    }
}
