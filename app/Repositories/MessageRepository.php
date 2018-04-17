<?php

namespace App\Repositories;

use App\Models\Message;
use App\Http\Requests\CreateMessageRequest;
use Prettus\Repository\Eloquent\BaseRepository;


/**
 * Class MessageRepositoryRepositoryEloquent
 * @package namespace App\Repositories;
 */
class MessageRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Message::class;
    }

    protected $fieldSearchable = [
        'nome',
        'data_message'
        

    ];

    



    /**
     * Boot up the repository, pushing criteria
     */
    //    public function boot()
    //    {
    //        $this->pushCriteria(app(RequestCriteria::class));
    //    }
}
