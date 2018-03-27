<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use SoftDeletes;

    public $table = 'notifications';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at', 'exibition'];

    public $fillable = [
        'description',
        'flg_satus',
        'exibition',
        'alunos_id',
        'year_class_id',
        'notification_type_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'description' => 'string',
        'flg_satus' => 'boolean',
        'exibition' => 'date',
        'alunos_id' => 'integer',
        'year_class_id' => 'integer',
        'notification_type_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => '',
        'description' => 'required',
        'flg_satus' => 'required',
        'exibition' => '',
        'alunos_id' => 'required',
        'year_class_id' => '',
        'notification_type_id' => '',
    ];


    public function notifiicationType()
    {
        return $this->hasOne(\App\Models\NotificationType::class);
    }

}
