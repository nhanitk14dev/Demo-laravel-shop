<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProductRepository
 *
 * @package namespace App\Repositories;
 */
interface ProductCategoryRepository extends RepositoryInterface
{
    public function getModel();

    public function getCategories($parent_id, $children = false);

    public function arrTreeCategories($parent_id);

    public function outTreeCategorySortTable($tree);

    public function outTreeCategoryRadioCheckbox($tree, $type = 'radio', $list_id = [], $disable_id = [], $root = false);

    public function store(array $input);

    public function update(array $input, $id);

    public function destroy($id);

    public function getAllChildrenIds(&$array, $parent_id);

    public function getCategoryBySlug($slug, $with = ['children'], $level = -1);

    public function sort($positions);

    
}
