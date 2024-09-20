<?php
namespace App\Services;

use App\Repositories\BooksRepository;
use App\Http\Requests\Books\ValidateRequest;

class BooksService
{
    protected $booksRepository;

    public function __construct(BooksRepository $booksRepository)
    {
        $this->booksRepository = $booksRepository;
    }

    public function getAll()
    {
        return $this->booksRepository->getAll();
    }
    public function getById($id)
    {
        return $this->booksRepository->getById($id);
    }

    public function store(ValidateRequest $request)
    {
        $validatedData = $request->validated();
        return $this->booksRepository->create($validatedData);
    }

    public function update($id, array $data)
    {
        return $this->booksRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->booksRepository->delete($id);
    }

    public function getBooksByAuthor($author_id)
    {
        return $this->booksRepository->getBooksByAuthor($author_id);
    }
}