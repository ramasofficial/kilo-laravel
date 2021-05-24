<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Get items by category_id.
     *
     * @return void
     */
    public function test_get_items_list_by_category_id()
    {
        $response = $this->get('/api/items/list/1');

        $response->assertStatus(200);

        $response->assertSee('items');
    }

    /**
     * Delete items by category_id.
     *
     * @return void
     */
    public function test_can_delete_items_by_category_id()
    {
        $response = $this->delete('/api/items/destroy/1');

        $response->assertStatus(200);

        $response->assertSee(0);
    }

    /**
     * Create and update items.
     *
     * @return void
     */
    public function test_can_create_and_update_items()
    {
        // Firstly we creating category
        $category = [
            'name' => 'Test category'
        ];

        $responseCategory = $this->json('POST', '/api/categories', $category)->decodeResponseJson();

        // Test - Can create item
        $data = [
            'category_id' => $responseCategory['id'],
            'name' => 'Test_item',
            'value' => 50,
            'quality' => -10,
        ];

        $responseItem = $this->json('POST', '/api/items/', $data);

        $responseItem->assertStatus(201);

        $responseItem->assertSee('id');

        // Test - Can update item
        $item = $responseItem->decodeResponseJson();

        $dataUpdate = [
            'value' => 60,
        ];

        $responseUpdate = $this->put('/api/items/' . $item['id'], $dataUpdate);

        $responseUpdate->assertStatus(200);

        $responseUpdate->assertSee(1);
    }
}
