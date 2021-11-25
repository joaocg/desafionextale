<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Media;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
		'is_enabled',
    ];

}
