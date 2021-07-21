<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Likeable;
use App\Models\Concerns\Likes;
use App\Models\Vote;
use Laravelista\Comments\Commentable;


class Post extends Model implements Likeable
{
    use HasFactory;

    use Likes;

    use Commentable;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vote()
    {
        return $this->hasMany(Vote::class);
    }

    //????
    /*  public function MostLikes()
    {
        return $this->hasMany(MostLikes::class);
    } */
}
