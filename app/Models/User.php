<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'pessoa_id', 'alunos_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the phone record associated with the user.
     */
    public function pessoa()
    {
        return $this->hasOne(\App\Models\Pessoa::class,
            'id',
            'pessoa_id');
    }

    public function aluno()
    {
        return $this->hasOne(\App\Models\Alunos::class,
            'id',
            'alunos_id');
    }

    public function getRoutePanel()
    {
        if ($this->hasRole('secretaria') || $this->hasRole('admin')) {
            return route('secretaria.index');
        } elseif ($this->hasRole('Professor')) {
            return route('professor.index');
        } elseif ($this->hasRole('Aluno')) {
            return route('aluno.dash.atividade');
        } else {
            return route('aluno.dash.atividade');
        }

    }

}
