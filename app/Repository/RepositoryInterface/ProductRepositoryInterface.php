<?php

namespace App\Repository\RepositoryInterface;

use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    public function all();
    public function personal($user_id);

    public function create($request);

    public function show($product_id);

    public function update($request);
    public function delete($product_id);

}