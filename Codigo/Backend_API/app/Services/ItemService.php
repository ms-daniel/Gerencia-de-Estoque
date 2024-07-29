<?php
namespace App\Services;

use App\Interfaces\IItemService;
use App\Models\Item;

class ItemService implements IItemService
{
    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function get($id)
    {
        return $this->item->find($id);
    }

    public function create(array $data)
    {
        return $this->item->create($data);
    }

    public function update($id, array $data)
    {
        $item = $this->item->find($id);
        if ($item) {
            $item->update($data);
            return $item;
        }
        return null;
    }

    public function delete($id)
    {
        $item = $this->item->find($id);
        if ($item) {
            $item->delete();
            return true;
        }
        return false;
    }

    public function getAll()
    {
        return $this->item->all();
    }
}
