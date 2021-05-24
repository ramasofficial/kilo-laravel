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

    /**
     * Gets error if name too short.
     *
     * @return void
     */
    public function test_get_errors_if_category_name_too_short()
    {
        $data = [
            'name' => 'Test'
        ];

        $response = $this->post('/api/categories', $data, ['Accept' => 'application/json']);

        $response->assertStatus(422);

        $response->assertSee('errors');
    }
}
