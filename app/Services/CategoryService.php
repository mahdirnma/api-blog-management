<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getCategories(){
        return app(TryService::class)(function (){
            return Category::where('is_active', 1)->get();
        });
    }
    public function setCategory($category)
    {
        return app(TryService::class)(function () use ($category){
            return Category::create($category);
        });
    }
}
