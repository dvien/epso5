<?php

namespace App\Repositories\Clients\Traits;

use App\Repositories\Crops\Crop;
use App\Repositories\Irrigations\Irrigation;
use App\Repositories\Regions\Region;
use App\Repositories\Trainings\Training;
use App\Repositories\Users\User;

trait ClientsRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function crop()
    {
        return $this->belongsToMany(Crop::class);
    }

    public function irrigation()
    {
        return $this->belongsToMany(Irrigation::class);
    }

    public function training()
    {
        return $this->belongsToMany(Training::class);
    }

    public function region()
    {
        return $this->belongsToMany(Region::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
