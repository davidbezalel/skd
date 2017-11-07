<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Citizen extends Authenticatable implements JWTSubject
{
    public $timestamps = false;
    protected $table = 'citizen';
    protected $fillable = ['username', 'password', 'name', 'address', 'phonenumber', 'nik', 'nokk'];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        // TODO: Implement getJWTIdentifier() method.
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        // TODO: Implement getJWTCustomClaims() method.
        return array();
    }
}
