<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: chenchangqin
 * Date: 2020-07-21
 * Time: 16:04
 */

namespace App\Controller;

use App\Service\UserAuthService;
use Hyperf\Di\Annotation\Inject;


class UserAuthController extends AbstractController
{

    /**
     * @Inject
     * @var UserAuthService
     */
    public $userAuthService;

    /**
     * 创建密钥
     * @param int $id
     * @return array
     */
    public function create(int $id)
    {
        $data = $this->request->post();
        $result = $this->userAuthService->createAuth($id,$data);

        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'result' => $result
        ];
    }

    /**
     * 更新密钥
     * @param int $id
     * @return array
     */
    public function update(int $id)
    {
        $data = $this->request->post();
        $result = $this->userAuthService->updateAuth($id,$data);

        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'result' => $result
        ];
    }

}