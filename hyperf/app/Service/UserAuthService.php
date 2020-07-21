<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: chenchangqin
 * Date: 2020-07-21
 * Time: 16:06
 */

namespace App\Service;

use App\Model\UserAuth;

class UserAuthService
{

    /**
     * @param int   $id
     * @param array $data
     * @return UserAuth
     */
    public function createAuth(int $id, array $data)
    {
        $auth                = new UserAuth();
        $auth->user_id       = $id;
        $auth->identity_type = $data['identity_type'];
        $auth->identifier    = $data['identifier'];
        $auth->save();

        return $auth;
    }

    /**
     * @param int   $id
     * @param array $data
     * @return UserAuth|\Hyperf\Database\Model\Builder|\Hyperf\Database\Model\Model|object|null
     */
    public function updateAuth(int $id, array $data)
    {
        $auth = UserAuth::query()->where('id',$id)->first();
        $auth->identifier = $data['identifier'];
        $auth->save();

        return $auth;
    }

}