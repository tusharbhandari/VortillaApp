<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $hidden = ['pivot'];
    protected $fillable = ['name','street1','street2','street3','city','postcode','state_id'];

    public function People()
    {
        return $this->belongsToMany(Person::class,'person_addresses','people_id','addresses_id');
    }
    public function State()
    {
        return $this->hasOne(State::class);  
    }
}
