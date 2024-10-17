<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $table="resume";
    protected $fillable = [
        'user_id',   // کلید خارجی به جای name
        'phone',
        'email',
        'city',
        'job',
        'description',
        'file',
        'job_history',
        'instagram',
        'telegram',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
