<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Get all categories.
     *
     * @return void
     */
    public function test_get_categories_list()
    {
        $response = $this->get('/api/categories/list');

        $response->assertStatus(200);

        $response->assertSee('categories');
    }

    /**
     * Create new category.
     *
     * @return void
     */
    public function test_can_create_new_category()
    {
        $data = [
            'name' => 'Test category'
        ];

        $response = $this->post('/api/categories', $data);

        $response->assertStatus(201);

        $response->assertSee('id');
    }
}
