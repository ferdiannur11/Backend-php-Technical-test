<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthorsService;
use App\Repositories\AuthorsRepository;
use App\Http\Requests\Authors\CreateAuthorsRequest;
class AuthorsController extends Controller
{
    protected $authorsService;
    protected $authorsRepository;

    public function __construct(AuthorsRepository $authorsRepository, AuthorsService $authorsService)
    {
        $this->authorsRepository = $authorsRepository;
        $this->authorsService = $authorsService;
    }
    public function getAll()
    {
        try {
            $authors = $this->authorsService->getAll();
            return response()->json([
                'responseCode' => 200,
                'ResponseDesc' => 'Success',
                'Data' => $authors,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'responseCode' => 500,
                'ResponseDesc' => $e->getMessage(),
                'Data' => [],
            ], 500);
        }
    }

    public function store(CreateAuthorsRequest $request)
    {
        try {
            $authors = $this->authorsService->store($request);
            return response()->json([
                'responseCode' => 201,
                'ResponseDesc' => 'Success',
                'Data' => $authors,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'responseCode' => 500,
                'ResponseDesc' => $e->getMessage(),
                'Data' => [],
            ], 500);
        }
    }

        public function show($id)
    {
        try {
            $author = $this->authorsService->getById($id);
            if (!$author) {
                return response()->json([
                    'responseCode' => 404,
                    'ResponseDesc' => 'Author Not Found',
                    'Data' => [],
                ], 404);
            }
            return response()->json([
                'responseCode' => 200,
                'ResponseDesc' => 'Success',
                'Data' => $author,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'responseCode' => 500,
                'ResponseDesc' => $e->getMessage(),
                'Data' => [],
            ], 500);
        }
    }
    public function update(CreateAuthorsRequest $request, $id)
    {
        try {
            $updatedAuthor = $this->authorsService->update($id, $request->all());
            return response()->json([
                'responseCode' => 200,
                'ResponseDesc' => 'Update Successful',
                'Data' => $updatedAuthor,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'responseCode' => 500,
                'ResponseDesc' => $e->getMessage(),
                'Data' => [],
            ], 500);
        }
    }

        public function destroy($id)
    {
        try {
            $deleted = $this->authorsService->delete($id);
            if ($deleted) {
                return response()->json([
                    'responseCode' => 200,
                    'ResponseDesc' => 'Deletion Successful',
                    'Data' => [],
                ], 200);
            } else {
                return response()->json([
                    'responseCode' => 404,
                    'ResponseDesc' => 'Author Not Found',
                    'Data' => [],
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'responseCode' => 500,
                'ResponseDesc' => $e->getMessage(),
                'Data' => [],
            ], 500);
        }
    }



}
