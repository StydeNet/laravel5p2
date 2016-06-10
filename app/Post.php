<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Events\PostWasPublished;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content'];

    public static function submit(array $data)
    {
        $post = new Post($data);

        if (empty($post->slug)) {
            $post->slug = Str::slug($post->title);
        }

        $post->author_id = auth()->user()->id;

        $post->save();

        return $post;
    }

    public function isPublished()
    {
        return $this->published_at != null;
    }

    public function publish()
    {
        if ($this->isPublished()) {
            return false;
        }

        $this->published_at = Carbon::now()->toDateTimeString();

        if ($saved = $this->save()) {
            event(new PostWasPublished($this));
        }

        return $saved;
    }
}