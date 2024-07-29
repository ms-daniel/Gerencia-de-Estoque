<?php
namespace App\Services;

use App\Interfaces\ISubcategoryService;
use App\Models\Subcategory;

class SubcategoryService implements ISubcategoryService
{
    protected $subcategory;

    public function __construct(Subcategory $subcategory)
    {
        $this->subcategory = $subcategory;
    }

    public function get($id)
    {
        return $this->subcategory->find($id);
    }
    public function create(array $data)
    {
        return $this->subcategory->create($data);
    }
    public function update($id, array $data)
    {
        $subcategory = $this->subcategory->find($id);
        if ($subcategory) {
            $subcategory->update($data);
            return $subcategory;
        }
        return null;
    }
    public function delete($id)
    {
        $subcategory = $this->subcategory->find($id);
        if ($subcategory) {
            $subcategory->delete();
            return true;
        }
        return false;
    }

    public function getAll()
    {
        return $this->subcategory->all();
    }
}
