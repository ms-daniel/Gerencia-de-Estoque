<?php
namespace App\Services;

use App\Interfaces\IStoreService;
use App\Models\Store;

class StoreService implements IStoreService
{
    protected $store;

    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    public function get($id)
    {
        return $this->store->find($id);
    }
    public function create(array $data)
    {
        return $this->store->create($data);
    }
    public function update($id, array $data)
    {
        $store = $this->store->find($id);
        if ($store) {
            $store->update($data);
            return $store;
        }
        return null;
    }
    public function delete($id)
    {
        $store = $this->store->find($id);
        if ($store) {
            $store->delete();
            return true;
        }
        return false;
    }

    public function getAll()
    {
        return $this->store->all();
    }
}
