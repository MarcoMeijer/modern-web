<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Message extends Model
{
    use HasFactory;
    use HasRichText;

    protected $guarded = [];

    protected $richTextFields = [
        'body',
    ];

    protected static function booted()
    {
        static::created(function ($message) {
            if ($message->thread->firstMessage->id !== $message->id) {
                $message->thread->n_replies += 1;
                $message->thread->save();
            }

            $message->thread->topic->n_messages += 1;
            $message->thread->topic->save();

            $message->author->profile->n_messages += 1;
            $message->author->profile->save();
        });
        static::deleting(function ($message) {
            if ($message->thread !== null && $message->thread->messages[0]->id === $message->id) {
                $message->thread->delete();
            }
        });
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}
