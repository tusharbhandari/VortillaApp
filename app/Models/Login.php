<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Person;

class Login extends Authenticatable implements JWTSubject
{
    use HasFactory;
    const CREATED_AT = 'active_form';
    const UPDATED_AT = 'active_thru';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['people_id','email','password','is_primary'];

    protected $hidden = [
        'password',
    ];

     // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function Person()
    {
        return $this->hasOne(Person::class);
    }
}
