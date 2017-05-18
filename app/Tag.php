<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getRouteKeyName() //omogucava da tag nadjemo preko imena, a ne preko ida
    {
        return 'name';
    }
}
