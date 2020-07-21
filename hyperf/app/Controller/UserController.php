<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: chenchangqin
 * Date: 2020-07-14
 * Time: 18:07
 */

namespace App\Controller;

use App\Service\UserService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;

/**
 * @Controller()
 */
class UserController extends AbstractController
{

    /**
     * @Inject
     * @var UserService
     */
    private $userService;

    /**
     * @return array
     */
    public function index()
    {
        $method = $this->request->getMethod();

        $result = $this->userService->userIndex();

        return [
            'method' => $method,
            'result' => $result
        ];
    }

    /**
     * @param int $id
     * @return array
     */
    public function info(int $id)
    {
        $result = $this->userService->userInfo($id);

        $method = $this->request->getMethod();
        return [
            'method' => $method,
            'result' => $result
        ];
    }

    /**
     * @param int $id
     * @return array
     */
    public function update(int $id)
    {
        $data   = $this->request->post();
        $result = $this->userService->updateUser($id, $data);

        $method = $this->request->getMethod();
        return [
            'method' => $method,
            'result' => $result
        ];
    }

    /**
     * @param int $id
     * @return array
     */
    public function delete(int $id)
    {
        $result = $this->userService->deleteUser($id);

        return [
            'result' => $result
        ];
    }

    /**
     * @return array
     */
    public function create()
    {
        $data   = $this->request->post();
        $result = $this->userService->createUser($data);

        $method = $this->request->getMethod();
        return [
            'method' => $method,
            'result' => $result
        ];
    }

}