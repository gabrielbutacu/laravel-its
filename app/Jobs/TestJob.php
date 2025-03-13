<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Post;

class TestJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public int $postId)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $post = Post::find($this->postId);
        if(!$post->description){
            $post->description = "inserisci descrizione...";
            $post->save();
        }
    }
}
