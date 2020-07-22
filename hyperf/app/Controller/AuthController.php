<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: chenchangqin
 * Date: 2020-07-21
 * Time: 18:06
 */

namespace App\Controller;

use App\Service\UserAuthService;
use Hyperf\Di\Annotation\Inject;
use Phper666\JwtAuth\Jwt;

class AuthController extends AbstractController
{

    /**
     * @Inject
     * @var UserAuthService
     */
    protected $userAuthService;
    /**
     * @Inject()
     * @var Jwt
     */
    protected $jwt;

    /**
     * 登录
     * @return array
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function login()
    {
        $data   = $this->request->post();
        $result = $this->userAuthService->validatePassword($data);

        if ($result) {
            $userData = [
                'uid'      => $result->user_id,
                'username' => $result->identifier,
            ];
            $token    = $this->jwt->getToken($userData);
            return [
                'code' => 0,
                'msg'  => 'success',
                'data' => [
                    'token' => (string)$token,
                    'exp'   => $this->jwt->getTTL(),
                ]
            ];
        }
        return [
            'code' => 0,
            'msg'  => 'error',
        ];
    }

    /**
     * 注销登录
     * @return bool
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function logout()
    {
        $this->jwt->logout();
        return true;
    }

}