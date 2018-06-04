<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ColorRepository;
use App\Models\Color;
use App\Validators\ColorValidator;

/**
 * Class ColorRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ColorRepositoryEloquent extends BaseRepository implements ColorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Color::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ColorValidator::class;
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
        return $this->model->select('*')->withTranslation();
    }

    public function store(array $input)
    {
        return $this->model->create($input);
    }

    public function update(array $input, $id)
    {
        $model = $this->model->findOrFail($id);
        $model->update($input);
        return $model;
    }

    public function hasProductsWithCategory($category_id)
    {
        $locale = \App::getlocale();
        return  \Cache::remember("{$locale}_colors_has_product_with_category_{$category_id}", CACHE_TIME, function () use ($category_id) {
            return $this->model->has('products')->whereHas('products.categories', function ($q) use ($category_id){
                $q->where('product_categories.id', $category_id);
            })->withCount(['products' => function($q) use ($category_id) {
                $q->whereHas('categories', function ($q1) use ($category_id) {
                    $q1->where('product_categories.id', $category_id);
                });
            }])->withTranslation()->get();
        });
    }
}
