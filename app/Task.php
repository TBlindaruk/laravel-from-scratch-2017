<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // public static function incomplete()
    // {
    //
    //   return static::where('completed', 0)->get();
    //
    // }

    // public static function scopeIncomplete() //Taks::incomplete()
    // {
    //
    //   return static::where('completed', 0)->get();
    //
    // }

    public static function scopeIncomplete($query)
    //Task::incomplete()->where('id', '>='. 2)->get();
    {

      return $query->where('completed', 0);

    }
}
