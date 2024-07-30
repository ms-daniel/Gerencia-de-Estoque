<?php
namespace App\Services;

use App\Interfaces\IUserProfileService;
use App\Models\UserProfile;

class UserProfileService implements IUserProfileService
{
    protected $userProfile;

    public function __construct(UserProfile $userProfile)
    {
        $this->userProfile = $userProfile;
    }

    public function get($id)
    {
        return $this->userProfile->find($id);
    }
    public function create(array $data)
    {
        return $this->userProfile->create($data);
    }
    public function update($id, array $data)
    {
        $userProfile = $this->userProfile->find($id);
        if ($userProfile) {
            $userProfile->update($data);
            return $userProfile;
        }
        return null;
    }
    public function delete($id)
    {
        $userProfile = $this->userProfile->find($id);
        if ($userProfile) {
            $userProfile->delete();
            return true;
        }
        return false;
    }

    public function getAll()
    {
        return $this->userProfile->all();
    }
}
