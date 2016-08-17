<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Rating;
use Carbon\Carbon;

class Virus extends Model {

    /**
     * Necessary because there seems to be a bug with the word virus
     * 
     * @var type 
     */
    protected $table = 'viruses';

    /**
     * Necessary to perform a date format in the view ($virus->discovered_at->format('m/d/Y h:i A'))
     * 
     * @var type 
     */
    protected $dates = ['discovered_at'];

    /**
     * These fields are mass assignable
     * 
     * @var type 
     */
    protected $fillable = ['name', 'description', 'discovered_at', 'active'];

    /**
     * Id is not mass assignable
     * 
     * @var type 
     */
    protected $guarded = ['id'];

    /**
     * One to many relationship
     * 
     * @return type
     */
    public function ratings() {
        return $this->hasMany(Rating::class);
    }

    /**
     * Necessary to save the date from our custom format 
     * 
     * @param type $value
     */
    public function setDiscoveredAtAttribute($value) {
        $this->attributes['discovered_at'] = Carbon::createFromFormat('m/d/Y h:i A', $value);
    }

}
