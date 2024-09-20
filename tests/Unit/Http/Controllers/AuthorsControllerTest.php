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
        // Buat author dengan factory
        $author = Authors::factory()->create();

        // Pastikan data tersedia
        $response = $this->get(route('authors.getAll'));
        $response->assertStatus(200);
    }

    /**
     * Test update author.
     */
    public function test_update_author()
    {
        // Buat author menggunakan factory
        $author = Authors::factory()->create();

        $updatedData = [
            "name" => "Jane Doe",
            "bio" => "An experienced developer who enjoys solving problems.",
            "birth_date" => "1990-05-15"
        ];

        // Gunakan ID dari author yang dibuat untuk update
        $this->put(route('authors.update', ['id' => $author->id]), $updatedData)
            ->assertStatus(200);
    }

    /**
     * Test delete author.
     */
    public function test_delete_author()
    {
        // Buat author menggunakan factory
        $author = Authors::factory()->create();

        // Gunakan ID dari author yang dibuat untuk delete
        $this->delete(route('authors.delete', ['id' => $author->id]))
            ->assertStatus(200);
    }
}