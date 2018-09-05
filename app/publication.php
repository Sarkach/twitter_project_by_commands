<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publication extends Model
{
    protected $fillable = ['content', 'status', 'user_id'];
}
