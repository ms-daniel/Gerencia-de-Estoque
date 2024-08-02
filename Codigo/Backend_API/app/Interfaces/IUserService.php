<?php
namespace App\Interfaces;

interface IUserService
{
    public function get($id);
    // public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function getAll();
    public function deleteTokens($user, array $tokenIds);
    public function deleteAllTokens($id);
}
