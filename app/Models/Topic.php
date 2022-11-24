<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function messages()
    {
        return $this->hasManyThrough(Message::class, Thread::class);
    }

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    public function lastThread()
    {
        return $this
            ->hasOne(Thread::class)
            ->latestOfMany();
    }
}
