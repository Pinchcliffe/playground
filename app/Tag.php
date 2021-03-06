<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function news()
    {
        return $this->belongsToMany(News::class);
    }

    public function getRouteKeyName() {

        return 'name';
    }
}
