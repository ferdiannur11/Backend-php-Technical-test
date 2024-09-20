<?php

namespace App\Repositories;

use App\Models\Authors;

class AuthorsRepository
{
     // Get all authors
     public function getAll()
     {
         return Authors::all();
     }

     // Get author by ID
     public function getById($id)
     {
         return Authors::find($id);
     }

     public function create(array $data)
     {
         return Authors::create($data);
     }

     // Update an author by ID
     public function update($id, array $data)
     {
         $author = Authors::find($id);
         if ($author) {
             $author->update($data);
             return $author;
         }
         return null;
     }

     // Delete an author by ID
     public function delete($id)
     {
         $author = Authors::find($id);
         if ($author) {
             return $author->delete();
         }
         return false;
     }
}
