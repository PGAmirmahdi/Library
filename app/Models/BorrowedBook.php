<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'borrow_date',
    ];

    // ارتباط با مدل User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ارتباط با مدل Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
