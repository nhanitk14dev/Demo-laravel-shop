<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SizeRepository;
use App\Models\Size;
use App\Validators\SizeValidator;

/**
 * Class SizeRepositoryEloquent
 *
 * @package namespace App\Repositories;
 */
class SizeRepositoryEloquent extends BaseRepository implements SizeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Size::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return SizeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function datatable()
    {
        return $this->model->select('*');
    }

    public function hasProductsWithCategory($category_id)
    {
        $locale = \App::getlocale();
        $value = \Cache::remember("{$locale}_{$category_id}", CACHE_TIME, function () use ($category_id) {
            return $this->model->whereHas('products.categories', function ($q) use ($category_id){
                $q->where('product_categories.id', $category_id);
            })->withCount(['products' => function($q) use ($category_id) {
                $q->whereHas('categories', function ($q1) use ($category_id) {
                    $q1->where('product_categories.id', $category_id);
                });
            }])->get();
        });
        return $value;
    }
}
