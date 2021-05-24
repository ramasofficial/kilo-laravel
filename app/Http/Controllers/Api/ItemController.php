<?php

namespace App\Http\Controllers\Api;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListItemRequest;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Return all items list by category_id
     *
     * @param  int $category - Category id
     * @return \Illuminate\Http\Response
     */
    public function list(int $category)
    {
        $items = Item::where('category_id', $category)->get();

        return response()->json(['items' => $items], 200);
    }

    /**
     * Store a new item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        $validated = $request->validated();

        $store = Item::create($validated);

        return $store;
    }

    /**
     * Update the specified item by id.
     *
     * @param  \Illuminate\Http\UpdateItemRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, $id)
    {
        $validated = $request->validated();

        $item = Item::findOrFail($id);

        $update = $item->update($validated);

        return $update;
    }
}
