<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Books;
use App\Models\Authors; // Import model Authors

class BooksControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test to create a book.
     */
    public function test_create_book()
    {
        // Buat author dengan factory
        $author = Authors::factory()->create();

        $formData = [
            "title" => "Learn PHP",
            "author_id" => $author->id, // Menggunakan ID penulis yang dibuat
            "publish_date" => "2022-08-15",
            "description" => "A comprehensive guide to learning PHP for web development."
        ];

        $this->post(route('books.create'), $formData)
            ->assertStatus(201);
    }

    /**
     * Test to get all books.
     */
    public function test_get_books()
    {
        // Buat book dengan factory
        $book = Books::factory()->create();

        // Pastikan data tersedia
        $response = $this->get(route('books.getAll'));
        $response->assertStatus(200);
    }

    /**
     * Test to update a book.
     */
    public function test_update_book()
    {
        // Buat book menggunakan factory
        $book = Books::factory()->create();

        $updatedData = [
            "title" => "Mastering PHP",
            "author_id" => $book->author_id, // Menggunakan ID penulis yang sama
            "publish_date" => "2023-01-10",
            "description" => "An advanced guide to mastering PHP."
        ];

        // Gunakan ID dari book yang dibuat untuk update
        $this->put(route('books.update', ['id' => $book->id]), $updatedData)
            ->assertStatus(200);
    }

    /**
     * Test to delete a book.
     */
    public function test_delete_book()
    {
        // Buat book menggunakan factory
        $book = Books::factory()->create();

        // Gunakan ID dari book yang dibuat untuk delete
        $this->delete(route('books.delete', ['id' => $book->id]))
            ->assertStatus(200);
    }
}