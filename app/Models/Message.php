<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //

    public $table = 'messages';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = ['nome', 'data_message'];

    public function phones()
    {
      return $this->hasMany('App\Models\Phone');
    }

    public function addTelefone(Phone $tel)
    {
      return $this->phones()->save($tel);
    }

    public function deletePhone()
    {
      foreach ($this->phones as $tel)
      {
          $tel->delete();
      }

      return true;
    }

    



    public static $rules = [
    'nome' => 'required|min:3|max:255',
    'data_message' => 'required'


    ];




}
