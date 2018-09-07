<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class picture extends Model
{
    protected $fillable = ['content', 'path', 'user_id'];
}
