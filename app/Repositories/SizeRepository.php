<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface SizeRepository
 *
 * @package namespace App\Repositories;
 */
interface SizeRepository extends RepositoryInterface
{
    public function datatable();

    public function hasProductsWithCategory($category_id);
}
