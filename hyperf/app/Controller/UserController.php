<?php
/**
 * Created by PhpStorm.
 * User: chenchangqin
 * Date: 2020-07-14
 * Time: 18:07
 */

namespace App\Controller;

use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\RequestInterface;

/**
 * @AutoController()
 */
class UserController extends AbstractController
{
    public function index(RequestInterface $request)
    {
        $id = $request->getMethod();
        return $id;
    }

    public function info(RequestInterface $request)
    {
        $id = $request->getMethod();
        return $id;
    }
}