<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Story;

class Media extends Model
{
    use HasFactory;

    protected $table = 'medias';

    function story() {
        return $this->belongsTo(Story::class, 'story_id');
    }

    function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
