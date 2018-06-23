<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ColorRepository
 * @package namespace App\Repositories;
 */
interface ColorRepository extends RepositoryInterface
{
    public function datatable();

    public function store(array $input);

    public function update(array $input, $id);

    public function hasProductsWithCategory($category_id);
}
