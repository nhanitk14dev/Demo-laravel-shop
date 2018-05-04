<?php

namespace App\Repositories;

use App\Models\Products;
use App\Models\ProductsTranslation;
use App\Models\ProductType;
use App\Traits\UploadPhotoTrait;
use App\Validators\ProductValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Breadcrumb;
/**
 * Class ProductRepositoryEloquent
 *
 * @package namespace App\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    use UploadPhotoTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */

    protected $supportedLocales = [];
    protected $defaultLocale = 'vi';



    public function model()
    {
        return Products::class;
    }

    /**
     *
     * Specify Validator class name
     *
     *
     * @return mixed
     */
    public function validator()
    {

        return ProductValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getModel()
    {
        return $this->model;
    }

    public function datatable()
    {
        $model = $this->model->select('*');//->with(['product_type']);
        return $model;

       /* return $model->with(['categories' => function ($q) {
            $q->orderBy('product_categories.level', 'asc');
        }])->withTranslation();*/
    }

    public function store(array $input)
    {

        $locales = config('laravellocalization.supportedLocales');

        foreach ($locales as $key => $value) {
            if (empty($input[$key]['name'])) {
                $input[$key]['name'] = $input[$key]['name'];
            }

        }

    }

    public function update(array $input, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }

    private function uploadPhotos($files, $product_id, $level = 0)
    {
        $config = config('photos.product_photo');

        foreach ($files as $key => $value) {
            $info = $this->storePhoto($value, $config);
            $arr = [
                'product_id' => $product_id,
                'path' => $info['path'],
                'file_name' => $info['file_name'],
                'level' => $level
            ];

            ProductPhoto::create($arr);
        }
    }




}
