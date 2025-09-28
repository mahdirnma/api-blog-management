<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function getPosts()
    {
        return app(TryService::class)(function (){
            return Post::where('is_active', 1)->orderBy('id', 'desc')->get();
        });
    }
    public function setPost($post){
        return app(TryService::class)(function () use ($post){
            return Post::create($post);
        });
    }
}
