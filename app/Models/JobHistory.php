<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobHistory extends Model
{
    use HasFactory;
    protected $table='job_history';

    protected $fillable = [
        'company',
        'department',
        'from_date',
        'to_date',
        'description',
        'user_id',
    ];

}
