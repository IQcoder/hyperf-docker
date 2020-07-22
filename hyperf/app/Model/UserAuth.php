<?php

declare (strict_types=1);

namespace App\Model;

use App\Cast\Hash;
use Hyperf\Database\Model\SoftDeletes;

/**
 * @property int            $id
 * @property int            $user_id
 * @property int            $identity_type
 * @property string         $identifier
 * @property string         $credential
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string         $deleted_at
 */
class UserAuth extends Model
{
    use SoftDeletes;
    const IDENTITY_TYPE_ACCOUNT = 1;
    const IDENTITY_TYPE_MOBILE = 2;
    const IDENTITY_TYPE_WECHAT = 3;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_auth';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'user_id' => 'integer', 'identity_type' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime', 'credential' => Hash::class.':sha256'];
}