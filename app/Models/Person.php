<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
    protected $hidden = ['pivot'];

    public function addreses()
    {
        return $this->belongsToMany(Address::class,'person_addresses','people_id','addresses_id');
    }
}
