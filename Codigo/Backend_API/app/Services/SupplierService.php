<?php
namespace App\Services;

use App\Interfaces\ISupplierService;
use App\Models\Supplier;

class SupplierService implements ISupplierService
{
    protected $store;

    public function __construct(Supplier $store)
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
        $userProfile = $this->store->find($id);
        if ($userProfile) {
            $userProfile->update($data);
            return $userProfile;
        }
        return null;
    }
    public function delete($id)
    {
        $userProfile = $this->store->find($id);
        if ($userProfile) {
            $userProfile->delete();
            return true;
        }
        return false;
    }

    public function getAll()
    {
        return $this->store->all();
    }
}
