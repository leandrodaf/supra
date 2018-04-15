<?php

namespace App\Repositories;

use App\Models\Diary;
use InfyOm\Generator\Common\BaseRepository;

class DiaryRepository extends BaseRepository
{

    public function model()
    {
        return Diary::class;
    }




}
