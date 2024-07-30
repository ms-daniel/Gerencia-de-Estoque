<?php
namespace App\Interfaces;

interface IStockService
{
    public function get($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);

    public function getAll();
}
