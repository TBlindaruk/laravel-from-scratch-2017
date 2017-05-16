<?php

namespace App;
use Carbon\Carbon;


// use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id']; //ova polja se mogu uredjivati
    // //protected $guarded = ['title', 'body']; //ova polja se ne mogu uredjivati

    public function comments()
    {
        //$post->comments
        return $this->hasMany(Comment::class); //Comment::class je isto kao i App\Comment

    }

    public function user() // $post->user->name
    {
        //$post->comments
        return $this->belongsTo(User::class); //Comment::class je isto kao i App\Comment

    }

    public function addComment($body)
    {
        $this->comments()->create(compact('body'));
        // Comment::create([
        //     'body' => $body,
        //     'post_id' => $this->id
        // ]);
    }

    public function scopeFilter($query, $filters)
    {
        if($month = $filters['month'])
        {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = $filters['year'])
        {
            $query->whereYear('created_at', $year);
        }
    }
}
