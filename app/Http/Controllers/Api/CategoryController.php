<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Return all categories list
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $categories = Category::select(['id', 'name'])->get();

        return response()->json(['categories' => $categories], 200);
    }

    /**
     * Store a new category.
     *
     * @param  \Illuminate\Http\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        $store = Category::create($validated);

        return $store;
    }
}
