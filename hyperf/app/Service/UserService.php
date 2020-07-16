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
    /**
     * @Cacheable(prefix="user", ttl=9000, listener="user-update")
     */
    public function user(int $id)
    {
        $user = User::query()->where('id',$id)->first();

        if($user){
            return $user->toArray();
        }

        return null;
    }

    /**
     * @CachePut(prefix="user", ttl=3601)
     */
    public function updateUser(int $id,array $data)
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
}