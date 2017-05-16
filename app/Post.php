<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $fillable = ['title', 'body']; //ova polja se mogu uredjivati
    // //protected $guarded = ['title', 'body']; //ova polja se ne mogu uredjivati

    public function comments()
    {
        //$post->comments
        return $this->hasMany(Comment::class); //Comment::class je isto kao i App\Comment

    }

    public function user() // $post->user->name
    {
        //$post->comments
        return $this->hasMany(User::class); //Comment::class je isto kao i App\Comment

    }

    public function addComment($body)
    {
        $this->comments()->create(compact('body'));
        // Comment::create([
        //     'body' => $body,
        //     'post_id' => $this->id
        // ]);
    }
}
