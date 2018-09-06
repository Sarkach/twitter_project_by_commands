<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = ['content', 'publication_id', 'user_id'];
}
