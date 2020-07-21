<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 
 * @property string $username 
 * @property int $status 
 * @property int $admin 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 */
class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';
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
    protected $casts = ['id' => 'integer', 'status' => 'integer', 'admin' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    public function auth()
    {
        return $this->hasMany(UserAuth::class,'user_id','id');
    }

}