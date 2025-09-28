<?php

namespace App\Services;

use App\Http\Requests\UpdatePostRequest;
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

    public function showPost(Post $post)
    {
        return app(TryService::class)(function () use ($post){
            return $post;
        });
    }

    public function updatePost($data, Post $post)
    {
        return app(TryService::class)(function () use ($data, $post){
            $status=$post->update($data);
            return $status;
        });
    }
}
