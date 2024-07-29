<?php
namespace App\Services;

use App\Interfaces\ISupplierService;
use App\Models\Supplier;

class SupplierService implements ISupplierService
{
    protected $supplier;

    public function __construct(Supplier $supplier)
    {
        $this->supplier = $supplier;
    }

    public function get($id)
    {
        return $this->supplier->find($id);
    }
    public function create(array $data)
    {
        return $this->supplier->create($data);
    }
    public function update($id, array $data)
    {
        $supplier = $this->supplier->find($id);
        if ($supplier) {
            $supplier->update($data);
            return $supplier;
        }
        return null;
    }
    public function delete($id)
    {
        $supplier = $this->supplier->find($id);
        if ($supplier) {
            $supplier->delete();
            return true;
        }
        return false;
    }

    public function getAll()
    {
        return $this->supplier->all();
    }
}
