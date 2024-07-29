<?php
namespace App\Services;

use App\Interfaces\ICategoryService;
use App\Models\Category;

class CategoryService implements ICategoryService
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function get($id)
    {
        return $this->category->find($id);
    }
    public function create(array $data)
    {
        return $this->category->create($data);
    }
    public function update($id, array $data)
    {
        $category = $this->category->find($id);
        if ($category) {
            $category->update($data);
            return $category;
        }
        return null;
    }
    public function delete($id)
    {
        $category = $this->category->find($id);
        if ($category) {
            $category->delete();
            return true;
        }
        return false;
    }

    public function getAll()
    {
        return $this->category->all();
    }
}
