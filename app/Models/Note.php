<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
     /** ini adalah bagia models untuk notes */

     /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'title',
        'body',
    ];
}
