<?php

namespace App\Repositories;

/**
 * Interface PageRepository
 * @package namespace App\Repositories;
 */
interface ThemeRepository
{
    public function load($arr = 0);

    public function find($filename);

    public function create(array $input);

    public function update(array $input, $filename);

    public function delete($filename);
}
