<?php
namespace App\Interfaces;

interface ISupplierService
{
    public function get($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);

    public function getAll();
}
