<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $table = 'topics';

    protected $fillable = ['title', 'body', 'is_published'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
