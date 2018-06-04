<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PageRepository
 * @package namespace App\Repositories;
 */
interface PageRepository extends RepositoryInterface
{
    public function findBySlug($slug, array $with = ['translations', 'blocks.translations', 'meta']);

    public function datatable();

    public function listPagesByGroupCode($group_code);
}
