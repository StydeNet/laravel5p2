<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
}