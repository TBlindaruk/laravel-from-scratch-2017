<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    //ovaj model je kreiran kako u ostalim modelima kao sto su task, post ne moramo definirati odredjene vrijednosti za svakog od njih
    //protected $guarded = []; //ova polja se ne mogu uredjivati
    protected $fillable = ['title', 'body']; //ova polja se mogu uredjivati

}
