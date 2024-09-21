<?php

namespace App\Repositories;

use App\Models\Authors;

class AuthorsRepository
{
     public function getAll()
     {
         return Authors::all();
     }

     public function getById($id)
     {
         return Authors::find($id);
     }

     public function create(array $data)
     {
         return Authors::create($data);
     }

     public function update($id, array $data)
     {
         $author = Authors::find($id);
         if ($author) {
             $author->update($data);
             return $author;
         }
         return null;
     }

     public function delete($id)
     {
         $author = Authors::find($id);
         if ($author) {
             return $author->delete();
         }
         return false;
     }
}