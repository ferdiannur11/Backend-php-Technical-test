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
        $author = Authors::factory()->create();
        $formData = [
            "title" => "Learn PHP",
            "author_id" => $author->id,
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
        $book = Books::factory()->create();

        $response = $this->get(route('books.getAll'));
        $response->assertStatus(200);
    }

    /**
     * Test to update a book.
     */
    public function test_update_book()
    {
        $book = Books::factory()->create();

        $updatedData = [
            "title" => "Mastering PHP",
            "author_id" => $book->author_id, // Menggunakan ID penulis yang sama
            "publish_date" => "2023-01-10",
            "description" => "An advanced guide to mastering PHP."
        ];

        $this->put(route('books.update', ['id' => $book->id]), $updatedData)
            ->assertStatus(200);
    }

    /**
     * Test to delete a book.
     */
    public function test_delete_book()
    {
        $book = Books::factory()->create();
        $this->delete(route('books.delete', ['id' => $book->id]))
            ->assertStatus(200);
    }
}