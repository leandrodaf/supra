<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class RangeDates
{
    public static function createDate($stringDate)
    {
        $explode = explode("-", $stringDate);

        $stringDate = Carbon::create($explode[0], $explode[1], $explode[2], 0, 0, 0);

        return $stringDate;
    }

    public static function generateDateRange(Carbon $start_date, Carbon $end_date, $class)
    {
        $dates = new Collection();

        for ($date = $start_date; $date->lte($end_date); $date->addDay()) {

            $data['date'] = $date->format('Y-m-d');
            $data['class'] = $class;
            $dates->push($data);
        }

        return $dates;
    }


    public static function formatDateColection($dates)
    {

        $datesFormated = new Collection();

        foreach ($dates as $date) {
            $datesFormated->push($date->format('Y-m-d'));
        }

        return $datesFormated;

    }
}