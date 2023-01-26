<?php

namespace Tests\Feature;

use App\Models\Message;
use App\Models\Thread;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThreadsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        User::factory(10)->create();
        Topic::factory()->create();
        Thread::factory(5)->create(['topic_id' => 1]);
        for ($i = 1; $i <= 5; $i++) {
            Message::factory(1 + $i)->create(['thread_id' => $i]);
        }
    }

    public function test_that_topic_has_list_of_threads()
    {
        $threads = Thread::all();
        $response = $this->get('/topics/1/threads');

        $response->assertStatus(200);

        foreach ($threads as $thread) {
            $response->assertSee($thread->title);
            $response->assertSee("Replies: $thread->n_replies");
        }

        $response->assertViewHas('threads', fn () => $threads->count() == 5);
    }

    public function test_that_thread_has_messages()
    {
        $threads = Thread::all();
        $response = $this->get('/threads/5');

        $response->assertStatus(200);

        foreach ($threads->last()->messages() as $message) {
            $response->assertSee($message->body->render());
        }

        $response->assertViewHas('messages', fn () => $threads->last()->messages()->count() == 6);
    }
}
