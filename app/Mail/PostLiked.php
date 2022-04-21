<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostLiked extends Mailable
{
    use Queueable, SerializesModels;

    public $Liker;
    public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $Liker,Post $post)
    {
        $this->Liker =$Liker;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.posts.post_liked')
        ->subject('someone liked ur post');
    }
}
