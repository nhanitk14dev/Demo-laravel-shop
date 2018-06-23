<?php

namespace App\Repositories;

use App\Traits\UploadPhotoTrait;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SliderRepository;
use App\Models\Slider;
use App\Models\ObjectMedia;
use App\Validators\SliderValidator;

/**
 * Class SliderRepositoryEloquent
 * @package namespace App\Repositories;
 */
class SliderRepositoryEloquent extends BaseRepository implements SliderRepository
{
    use UploadPhotoTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Slider::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return SliderValidator::class;
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
        return $this->model->select('*')->orderBy('key', 'asc')->withTranslation();
    }

    public function create(array $input)
    {
        $model =  $this->model->create($input);

        if (!empty($input['photos'])) {
            $model->createMedia($input['photos']);
        }

        return $model;
    }

    public function update(array $input, $id)
    {
        $model = $this->model->findOrFail($id);

        if (!empty($input['photos'])) {
            $model->createMedia($input['photos']);
        }

        if (!empty($input['delete_photos'])) {
            ObjectMedia::whereIn('id', $input['delete_photos'])->delete();
        }

        $model->update($input);

        return $model;
    }
}
