<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Services\ApiResponseBuilder;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(public CategoryService $categoryService){}

    public function index()
    {
        $result=$this->categoryService->getCategories();
        return (new ApiResponseBuilder())->data($result->data)->response();
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $result=$this->categoryService->setCategory($request->validated());
        $apiResponse = $result->success?
            (new ApiResponseBuilder())->message('categories added successfully'):
            (new ApiResponseBuilder())->message('categories added unsuccessfully');
        return $apiResponse->data($result->data)->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $result=$this->categoryService->showCategory($category);
        $apiResponse = $result->success?
            (new ApiResponseBuilder())->message('categories showed successfully'):
            (new ApiResponseBuilder())->message('categories show unsuccessfully');
        return $apiResponse->data($result->data)->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
