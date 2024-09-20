<?php
namespace App\Services;

use App\Repositories\AuthorsRepository;
use App\Http\Requests\Authors\CreateAuthorsRequest;

class AuthorsService
{
    protected $authorsRepository;

    public function __construct(AuthorsRepository $authorsRepository)
    {
        $this->authorsRepository = $authorsRepository;
    }


    // Get all authors
    public function getAll()
    {
        return $this->authorsRepository->getAll();
    }

    // Get author by ID
    public function getById($id)
    {
        return $this->authorsRepository->getById($id);
    }

    public function store(CreateAuthorsRequest $request)
    {
        $validatedData = $request->validated();
        return $this->authorsRepository->create($validatedData);
    }

    // Update author by ID
    public function update($id, array $data)
    {
        return $this->authorsRepository->update($id, $data);
    }

    // Delete author by ID
    public function delete($id)
    {
        return $this->authorsRepository->delete($id);
    }
}
