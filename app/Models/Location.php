<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
        protected $table = 'locations';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'zipCode',
        'street',
        'number',
        'city',
        'complement',
        'neighborhood',
        'city',
        'state',
        'country'
    ];

    /**
     * GET Aluno
     */
    public function aluno()
    {
        return $this->belongsToMany('App\Models\Aluno');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pessoa()
    {
        return $this->belongsToMany(\App\Models\Pessoa::class);
    }
}
