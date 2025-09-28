<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\ApiResponseBuilder;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(public PostService $postService){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result=$this->postService->getPosts();
        return (new ApiResponseBuilder())->message('post gets successfully')->data($result)->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $result=$this->postService->setPost($request->all());
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('post created successfully'):
            (new ApiResponseBuilder())->message('post not created successfully');
        return $apiResponse->data($result->data)->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $result=$this->postService->showPost($post);
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('post showed successfully'):
            (new ApiResponseBuilder())->message('post showed unsuccessfully');
        return $apiResponse->data($result->data)->response();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $result=$this->postService->updatePost($request->all(), $post);
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('post updated successfully'):
            (new ApiResponseBuilder())->message('post updated unsuccessfully');
        return $apiResponse->data($result->data)->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $result=$this->postService->deletePost($post);
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('post deleted successfully'):
            (new ApiResponseBuilder())->message('post deleted unsuccessfully');
        return $apiResponse->response();
    }
}
