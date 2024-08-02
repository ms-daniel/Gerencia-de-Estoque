<?php
namespace App\Services;

use App\Interfaces\IUserService;
use App\Models\PersonalAccessToken;
use App\Models\User;
use Illuminate\Database\QueryException;
use Exception;

class UserService implements IUserService
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function get($id)
    {
        return $this->user->find($id);
    }

    // public function create(array $data)
    // {
    //     return $this->user->create($data);
    // }

    public function update($id, array $data)
    {
        $userProfile = $this->user->find($id);
        if ($userProfile) {
            $userProfile->update($data);
            return $userProfile;
        }
        return null;
    }

    public function delete($id)
    {
        $userProfile = $this->user->find($id);
        if ($userProfile) {
            $userProfile->delete();
            return true;
        }
        return false;
    }


    public function getAll()
    {
        return $this->user->all();
    }

    public function deleteTokens($user, array $tokenIds)
    {
        try {
            $deletedCount = PersonalAccessToken::destroy($tokenIds);

            return $deletedCount;
        } catch (QueryException $e) {
            throw new Exception('Database error: ' . $e->getMessage());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteAllTokens($id)
    {
        $user = $this->user->find($id);

        if($user){
            $user->tokens()->delete();
            return true;
        }

        return false;
    }
}
