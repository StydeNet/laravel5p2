<?php

namespace App\Events;

use App\Post;

class PostWasPublished extends Event
{
    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

}
