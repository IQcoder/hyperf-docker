<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: chenchangqin
 * Date: 2020-07-16
 * Time: 14:51
 */

namespace App\Service;

use App\Model\User;
use App\Model\UserAuth;
use Hyperf\DbConnection\Db;

class UserService
{

    public function userIndex()
    {
        $user = User::query()->paginate(2);
        return $user;
    }

    /**
     * @param int $id
     * @return array
     */
    public function userInfo(int $id): array
    {
        $user = User::findFromCache($id);
        return [
            'user' => $user->toArray(),
            'auth' => $user->auth
        ];
    }

    public function createUser(array $data)
    {
        Db::beginTransaction();
        try {
            $user           = new User();
            $user->username = $data['username'];
            $user->save();
            $auth                = new UserAuth();
            $auth->user_id       = $user->id;
            $auth->identity_type = $data['identity_type'];
            $auth->identifier    = $data['identifier'];
            $auth->save();
            Db::commit();
        } catch (\Throwable $exception) {
            Db::rollBack();
        }
        return $user;
    }

    /**
     * @param int   $id
     * @param array $data
     * @return array
     */
    public function updateUser(int $id, array $data)
    {

        $user = User::query()->find($id);
        foreach ($data as $key => $value) {
            $user->{$key} = $value;
        }
        $user->save();

        return [
            'user' => $user->toArray(),
            'auth' => $user->auth
        ];
    }

    /**
     * @param int $id
     * @return array
     */
    public function deleteUser(int $id)
    {
        $user = User::query()->find($id);
        return [
            'user' => $user
        ];
    }
}