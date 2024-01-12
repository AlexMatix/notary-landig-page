<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailboxComplaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact',
        'affair',
        'complaint',
    ];
}
