<?php

namespace App\Repositories;

use App\Models\Virus;

/**
 * Description of VirusRepository
 *
 * @author andrewstarlike
 */
class VirusRepository {

    public function getVirusesAndRatings() {
        //select `viruses`.*, ROUND(avg(ratings.rating), 2 ) AS average from `viruses` left join `ratings` on `ratings`.`virus_id` = `viruses`.`id` group by `ratings`.`virus_id`
        return Virus::select('viruses.*', \DB::raw('ROUND(avg(ratings.rating), 2 ) AS average'))
                        ->leftJoin('ratings', 'ratings.virus_id', '=', 'viruses.id')
                        ->groupBy('viruses.id')
                        ->get();
    }

}