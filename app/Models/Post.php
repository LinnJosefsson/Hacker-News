<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vote;
use Laravelista\Comments\Commentable;


class Post extends Model
{
    use HasFactory;

    use Commentable;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vote()
    {
        return $this->hasMany(Vote::class);
    }

    public function postVotedBy(User $user)
    {
        return $this->vote->contains('user_id', $user->id);
    }
}
