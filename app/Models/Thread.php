<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::deleting(function ($thread) {
            foreach ($thread->messages as $message) {
                $message->delete();
            }
        });
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
