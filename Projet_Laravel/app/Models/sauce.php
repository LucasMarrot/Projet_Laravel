<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sauce extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<>
     */
    protected $fillable = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, array>
     */
    protected $casts = [
        'userLiked' => array(),
        'userDislkied' => array()
    ];
}
