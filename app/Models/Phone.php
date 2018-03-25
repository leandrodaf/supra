<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'phones';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['number'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function aluno()
    {
        return $this->belongsToMany(\App\Models\Alunos::class);
    }

    
    public function message()
    {
      return $this->belongsTo(App\Models\Message::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function pessoa()
    {
        return $this->belongsToMany(\App\Models\Pessoa::class);
    }
}
