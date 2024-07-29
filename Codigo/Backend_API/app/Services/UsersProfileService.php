<?php
namespace App\Services;

use App\Interfaces\IUsersProfileService;
use App\Models\UsersProfile;

class UsersProfileService implements IUsersProfileService
{
    protected $usersProfile;

    public function __construct(UsersProfile $usersProfile)
    {
        $this->usersProfile = $usersProfile;
    }

    public function get($id)
    {
        return $this->usersProfile->find($id);
    }
    public function create(array $data)
    {
        return $this->usersProfile->create($data);
    }
    public function update($id, array $data)
    {
        $userProfile = $this->usersProfile->find($id);
        if ($userProfile) {
            $userProfile->update($data);
            return $userProfile;
        }
        return null;
    }
    public function delete($id)
    {
        $userProfile = $this->usersProfile->find($id);
        if ($userProfile) {
            $userProfile->delete();
            return true;
        }
        return false;
    }

    public function getAll()
    {
        return $this->usersProfile->all();
    }
}
