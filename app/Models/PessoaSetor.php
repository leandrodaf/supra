<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PessoaSetor extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pessoa_setor';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pessoa_id',
        'setores_id',
        'flg_principal'
    ];
}
