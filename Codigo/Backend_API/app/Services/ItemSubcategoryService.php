<?php
namespace App\Services;

use App\Interfaces\IItemSubcategoryService;
use App\Models\ItemSubcategory;

class ItemSubcategoryService implements IItemSubcategoryService
{
    protected $itemSubcategory;

    public function __construct(ItemSubcategory $itemSubcategory)
    {
        $this->itemSubcategory = $itemSubcategory;
    }

    public function get($id)
    {
        return $this->itemSubcategory->find($id);
    }
    public function create(array $data)
    {
        return $this->itemSubcategory->create($data);
    }
    public function update($id, array $data)
    {
        $itemSubcategory = $this->itemSubcategory->find($id);
        if ($itemSubcategory) {
            $itemSubcategory->update($data);
            return $itemSubcategory;
        }
        return null;
    }
    public function delete($id)
    {
        $itemSubcategory = $this->itemSubcategory->find($id);
        if ($itemSubcategory) {
            $itemSubcategory->delete();
            return true;
        }
        return false;
    }

    public function getAll()
    {
        return $this->itemSubcategory->all();
    }
}
