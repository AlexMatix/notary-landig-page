<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cite extends Model
{

    const NO_PROCESS = 0;
    const PROCESS = 1;

    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'cite',
        'process'
    ];

}
