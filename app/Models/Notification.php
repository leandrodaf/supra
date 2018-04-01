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
        'year_class_id',
        'title',
        'exibition',
        'notification_type_id',
        'description',
        'flg_status',
        'alunos_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'exibition' => 'date',
        'year_class_id' => 'integer',
        'notification_type_id' => 'integer',
        'description' => 'string',
        'flg_status' => 'boolean',
        'alunos_id' => 'integer',

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'exibition' => 'required',
        'year_class_id' => '',
        'notification_type_id' => '',
        'description' => 'required',
        'flg_status' => '',
        'alunos_id' => '',
    ];


    public function type()
    {
        return $this->hasMany(\App\Models\NotificationType::class,
            'id',
            'notification_type_id');
    }

}
