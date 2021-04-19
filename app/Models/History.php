<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'word_id', 'point'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function word()
    {
        return $this->belongsTo(Word::class, 'word_id');
    }
}
