<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioPessoa extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuario_pessoas';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario_id',
        'pessoas_id'
    ];

    /**
     * Get the phone record associated with the user.
     */
    public function getPessoa()
    {
        return $this->hasOne('App\Pessoa', 'id', 'pessoas_id')->get()[0];
    }
}
