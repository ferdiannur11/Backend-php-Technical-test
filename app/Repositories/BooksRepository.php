<?php

namespace App\Repositories;

use App\Models\Books;
use App\Models\Authors;

class BooksRepository
{
     public function getAll()
     {
         return Books::all();
     }

     public function getById($id)
     {
         return Books::find($id);
     }

     public function create(array $data)
     {
         return Books::create($data);
     }

     public function update($id, array $data)
     {
         $author = Books::find($id);
         if ($author) {
             $author->update($data);
             return $author;
         }
         return null;
     }

     public function delete($id)
     {
         $author = Books::find($id);
         if ($author) {
             return $author->delete();
         }
         return false;
     }

     public function getBooksByAuthor($author_id)
    {
        $author = Authors::with('books')->find($author_id);
        if (!$author) {
            return null;
        }
        return [
            'id' => $author->id,
            'name' => $author->name,
            'bio' => $author->bio,
            'birth_date' => $author->birth_date,
            'books' => $author->books->map(function ($book) {
                return [
                    'id' => $book->id,
                    'title' => $book->title,
                    'description' => $book->description,
                    'publish_date' => $book->publish_date,
                ];
            }),
        ];
    }
}