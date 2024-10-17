<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    use HasFactory;
    protected $table = 'calls'; // اشاره به جدول 'call'
    protected $fillable=[
        'name',
        'family',
        'email',
        'number',
        'description'
    ];
}
