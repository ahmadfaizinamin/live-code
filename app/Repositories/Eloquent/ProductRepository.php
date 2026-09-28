<?php
namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Override;

class ProductRepository implements ProductRepositoryInterface
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    #[Override]
    public function getAll()
    {
        return $this->model->all();
    }

    #[Override]
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    #[Override]
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    #[Override]
    public function update($id, array $data)
    {
        $item = $this->getById($id);

        $item->update($data);
        return $item;
    } 

    #[Override]
    public function delete($id)
    {
        $item = $this->getById($id);

        return $item->delete();
    }
}