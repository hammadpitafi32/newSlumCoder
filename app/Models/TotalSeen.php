<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TotalSeen extends Model
{
   public $table = 'total_seens';

   public $fillable = [
        'post_id',
        'total_seen'
    ];
}
