<?php
namespace App\Services;

use App\Interfaces\IStockService;
use App\Models\Stock;

class StockService implements IStockService
{
    protected $stock;

    public function __construct(Stock $stock)
    {
        $this->stock = $stock;
    }

    public function get($id)
    {
        return $this->stock->find($id);
    }
    public function create(array $data)
    {
        return $this->stock->create($data);
    }
    public function update($id, array $data)
    {
        $stock = $this->stock->find($id);
        if ($stock) {
            $stock->update($data);
            return $stock;
        }
        return null;
    }
    public function delete($id)
    {
        $stock = $this->stock->find($id);
        if ($stock) {
            $stock->delete();
            return true;
        }
        return false;
    }

    public function getAll()
    {
        return $this->stock->all();
    }
}
