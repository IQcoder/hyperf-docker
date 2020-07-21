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
class AuthController extends AbstractController
{

    /**
     * @Inject
     * @var UserAuthService
     */
    public $userAuthService;

    public function login()
    {
        $data = $this->request->post();
    }

    public function logout()
    {

    }

}