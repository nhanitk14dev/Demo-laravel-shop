<?php
namespace App\Http\ViewComposers;

use App\Repositories\ProductCategoryRepository;
use Illuminate\View\View;

class CategoryComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $category;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(ProductCategoryRepository $category)
    {
        // Dependencies automatically resolved by service container...
        $this->category = $category;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $locale = \App::getLocale();
        $value =  \Cache::remember("{$locale}_composer_categories", CACHE_TIME, function () {
            return $this->category->getCategories(0, true, 1);
        });

        $view->with('composer_categories', $value);
    }
}