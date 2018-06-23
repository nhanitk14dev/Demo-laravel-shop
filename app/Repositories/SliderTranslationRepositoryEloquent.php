<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SliderTranslationRepository;
use App\Entities\SliderTranslation;
use App\Validators\SliderTranslationValidator;

/**
 * Class SliderTranslationRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SliderTranslationRepositoryEloquent extends BaseRepository implements SliderTranslationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SliderTranslation::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SliderTranslationValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
