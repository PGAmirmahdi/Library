<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    use HasFactory;
    protected $table="examples";
    protected $fillable=[
        'title',
        'description',
        'properties',
        'file',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
