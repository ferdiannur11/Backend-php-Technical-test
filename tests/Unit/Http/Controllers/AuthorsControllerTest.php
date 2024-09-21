<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Authors; // Pastikan model Author diimport

class AuthorsControllerTest extends TestCase
{
    use RefreshDatabase; // Refresh database setiap kali menjalankan test

    /**
     * Test create author.
     */
    public function test_create_author()
    {
        $formData = [
            "name" => "John Doe",
            "bio" => "A software engineer who loves coding.",
            "birth_date" => "2021-11-11"
        ];

        $this->post(route('authors.create'), $formData)
            ->assertStatus(201);
    }

    /**
     * Test get all authors.
     */
    public function test_get_authors()
    {
        $author = Authors::factory()->create();
        $response = $this->get(route('authors.getAll'));
        $response->assertStatus(200);
    }

    /**
     * Test update author.
     */
    public function test_update_author()
    {
        $author = Authors::factory()->create();
        $updatedData = [
            "name" => "Jane Doe",
            "bio" => "An experienced developer who enjoys solving problems.",
            "birth_date" => "1990-05-15"
        ];

        $this->put(route('authors.update', ['id' => $author->id]), $updatedData)
            ->assertStatus(200);
    }

    /**
     * Test delete author.
     */
    public function test_delete_author()
    {
        $author = Authors::factory()->create();
        $this->delete(route('authors.delete', ['id' => $author->id]))
            ->assertStatus(200);
    }
}