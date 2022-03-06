<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DiaryPost extends Model
{
    use HasFactory;
    //use the following to prevent diary_posts doesn't exist error
    protected $table = 'diaryposts';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
