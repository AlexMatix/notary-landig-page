<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailboxComplaint extends Model
{

    const NO_PROCESS = 0;
    const PROCESS = 1;
    const SPAM = 2;
    use HasFactory;

       protected $fillable = [
        'name',
        'email',
        'affair',
        'complaint',
        'phone',
        'process',
    ];
}
