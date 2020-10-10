<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excersize extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_create',
        'filename',
        
    ];

}
