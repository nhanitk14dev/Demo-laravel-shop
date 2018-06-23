<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\ProductsTranslation;
use App\Traits\UploadPhotoTrait;
use App\Validators\ProductValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Carbon\Carbon;
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
        return Product::class;
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
        $input['is_new'] = empty($input['is_new']) ? 0 : 1;
        $input['active'] = empty($input['active']) ? 0 : 1;

        $input['start_date_promotion'] = !empty($input['start_date_promotion']) ? convertDatabaseTime($input['start_date_promotion'], PHP_DATE, DATABASE_DATE) : date(DATABASE_DATE);

        $input['end_date_promotion'] = !empty($input['end_date_promotion']) ? convertDatabaseTime($input['end_date_promotion'], PHP_DATE, DATABASE_DATE) : date(DATABASE_DATE);

        $product = $this->model->create($input);

        if (!empty($input['photos'])) {
            $this->uploadPhotos($input['photos'], $product->id);
        }

        if (!empty($input['category_id'])) { //1 mảng loại sản phẩm trong outTreeCategoryRadioCheckbox
            $product->categories()->attach($input['category_id']);
        }

        if (!empty($input['color_id'])) { 
            $product->colors()->attach($input['color_id']);
        }

        if (!empty($input['size_id'])) { 
            $product->sizes()->attach($input['size_id']);
        }

        return $product;

    }

    public function update(array $input, $id)
    {

        $product = $this->model->findOrFail($id);

        $input['is_new'] = empty($input['is_new']) ? 0 : 1;

        $input['active'] = empty($input['active']) ? 0 : 1;

        $input['start_date_promotion'] = !empty($input['start_date_promotion']) ? convertDatabaseTime($input['start_date_promotion'], PHP_DATE, DATABASE_DATE) : date(DATABASE_DATE);

        $input['end_date_promotion'] = !empty($input['end_date_promotion']) ? convertDatabaseTime($input['end_date_promotion'], PHP_DATE, DATABASE_DATE) : date(DATABASE_DATE);

        $product->update($input);

        if (!empty($input['delete_photos']) && is_array($input['delete_photos'])) {
            $this->deletePhotos($product, $input['delete_photos'], false);//false ko cho xoa all
        }

        if (!empty($input['photos'])) {
            $this->uploadPhotos($input['photos'], $product->id);
        }

        if (!empty($input['category_id'])) { //1 mảng loại sản phẩm trong outTreeCategoryRadioCheckbox
            $product->categories()->sync($input['category_id']);
        } else {
            $product->categories()->detach();//neu chưa có 
        }

        if (!empty($input['metadata'])) {
            $product->metaCreateOrUpdate($input['metadata']);
        }

        if (!empty($input['color_id'])) { 
            $product->colors()->sync($input['color_id']);
        }else {
            $product->colors()->detach();//neu chưa có 
        }

        if (!empty($input['size_id'])) { 
            $product->sizes()->attach($input['size_id']);
        }else {
            $product->sizes()->detach();//neu chưa có 
        }

        return $product;
    }

    public function destroy($id)
    {
        $product = $this->model->findOrFail($id);

        //delete metadata
        $product->meta()->delete();

        // delete photos
        $this->deletePhotos($product, [], true);

        //delete
        $product->delete();
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

    private function deletePhotos($product, array $ids, $all = false)
    {
        if ($all) {
            $photos = $product->photos;
        } else {

            $photos = $product->photos()->whereIn('product_photo.id', $ids)->get();
        }

        foreach ($photos as $photo) {
            $arr = $photo->arrayPath(false);
            foreach ($arr as $value) {
                \Storage::delete($value);
            }
            $photo->delete();
        }
    }

    //san-pham-moi-nhat & sp-khac
    public function listProductNew($is_new = false, $limit = 0)
    {
        $model = $this->model->active()//dkien active sảnpham
            ->with('categories')
            ->withTranslation();
        if ($is_new) {
            $model->where('is_new', 1)->orderBy('is_new', 'desc');
        }
        else{
            $model->where('is_new', 0);
        }
        /*$model->orderBy('is_top', 'desc')
            ->orderBy('publish_at', 'desc');*/

        if ($limit) {
            return $model->limit($limit)
                ->get();
        }
        return $model->paginate(6);
    }

    public function listProductPromotion()
    {

    }

    public function findProductBySlug($slug)
    {
        $locale = \App::getLocale();
        return $this->model
            ->whereTranslation('slug', $slug, $locale)
            ->with('translations')
            ->firstOrFail();

    }

}
