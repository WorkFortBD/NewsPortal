<?php

namespace App\Repository\Product;

use App\Http\Resources\BrandResource;
use App\Http\Resources\Collections\BrandCollection;
use App\Models\Brand;
use App\Repository\RepositoryInterface;

class BrandRepository implements RepositoryInterface
{
    public function all()
    {
        return new BrandResource(Brand::all());
    }

    public function paginate($perPage = 20)
    {
        return new BrandResource(Brand::paginate($perPage));
        // return new BrandCollection(Brand::paginate($perPage));
    }

    public function searchWithPagination($perPage = 20, $keyword)
    {
    }

    public function searchWithoutPagination($keyword)
    {
    }

    public function findById($id)
    {
    }

    public function findBySlug($slug)
    {
    }

    public function store(array $data)
    {
    }

    public function storeMany(array $data)
    {
    }

    public function update($id, array $data)
    {
    }

    public function updateStatus($id, $status)
    {
    }

    public function delete($id)
    {
    }

    public function deleteMany(array $data)
    {
    }
}
