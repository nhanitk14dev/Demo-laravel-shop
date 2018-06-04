<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProductRepository
 *
 * @package namespace App\Repositories;
 */
interface ProductRepository extends RepositoryInterface
{
    public function getModel();

    

    public function datatable();

    public function store(array $input);

    public function update(array $input, $id);

    public function destroy($id);

    public function listProductNew($is_new = false, $limit = 0);


    public function listProductPromotion();

    
}
