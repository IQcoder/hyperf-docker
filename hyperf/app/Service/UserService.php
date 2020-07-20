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
use Hyperf\Cache\Annotation\Cacheable;
use Hyperf\Cache\Annotation\CachePut;

class UserService
{


    public function user(int $id)
    {
        $user = User::findFromCache($id);

        return $user;
    }

    public function userIndex()
    {
        $user = User::query()->paginate(10);
        return $user;
    }



    public function userUpdate(int $id, array $data)
    {

        $user = User::query()->find($id);
        foreach ($data as $key => $value) {
            $user->{$key} = $value;
        }
        $user->save();

        return [
            'user' => $user->toArray(),
        ];
    }


    public function userDelete(int $id)
    {
        $user = User::query()->find($id);
        return [
            'user' => $user
        ];
    }
}