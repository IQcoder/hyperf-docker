<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: chenchangqin
 * Date: 2020-07-21
 * Time: 17:40
 */

namespace App\Cast;

use Hyperf\Contract\CastsInboundAttributes;

class Hash implements CastsInboundAttributes
{
    /**
     * 盐值
     * @var int
     */
    protected $cost = 13;

    /**
     * 哈希算法
     * @var string
     */
    protected $algorithm;

    /**
     * 创建一个新的类型转换类实例
     * Hash constructor.
     * @param string $algorithm
     */
    public function __construct($algorithm = 'md5')
    {
        $this->algorithm = $algorithm;
    }

    /**
     * 转换成将要进行存储的值
     * @param object $model
     * @param string $key
     * @param mixed  $value
     * @param array  $attributes
     * @return array|string
     */
    public function set($model, $key, $value, $attributes)
    {
        return password_hash($value, PASSWORD_DEFAULT, ['cost' => $this->cost]);
    }
}