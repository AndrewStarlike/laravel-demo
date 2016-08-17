<?php

namespace App\Models;

use App\Models\Virus;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model {

    public function virus() {
        return $this->belongsTo(Virus::class);
    }

}
