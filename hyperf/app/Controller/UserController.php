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
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\HttpServer\Contract\RequestInterface;

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
     * @param RequestInterface $request
     * @return string
     * @RequestMapping(path="index",methods={"get"})
     */
    public function index(RequestInterface $request)
    {
        $id = $request->getMethod();
        return $id;
    }

    /**
     * @param RequestInterface $request
     * @param int              $id
     * @return array
     * @RequestMapping(path="/user/{id:\d+}",methods={"get"})
     */
    public function info(RequestInterface $request,int $id)
    {
        $result = $this->userService->user($id);

        $method = $request->getMethod();
        return [
            'method' => $method,
            'result' => $result
        ];
    }

    /**
     * @param RequestInterface $request
     * @param int              $id
     * @return array
     * @RequestMapping(path="update/[{id:\d+}]",methods={"put"})
     */
    public function update(RequestInterface $request,int $id)
    {
        $data = $request->post();
        $result = $this->userService->updateUser($id,$data);

        $method = $request->getMethod();
        return [
            'method' => $method,
            'result' => $result
        ];
    }

}