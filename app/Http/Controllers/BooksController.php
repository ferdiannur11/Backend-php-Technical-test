<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BooksService;
use App\Repositories\BooksRepository;
use App\Http\Requests\Books\ValidateRequest;
use App\Models\Authors;

class BooksController extends Controller
{
    protected $booksService;
    protected $booksRepository;

    public function __construct(BooksRepository $booksRepository, BooksService $booksService)
    {
        $this->booksRepository = $booksRepository;
        $this->booksService = $booksService;
    }
    public function getAll()
    {
        try {
            $authors = $this->booksService->getAll();
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

    public function store(ValidateRequest $request)
    {
        try {
            $authors = $this->booksService->store($request);
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
            $author = $this->booksService->getById($id);
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
    public function update(ValidateRequest $request, $id)
    {
        try {
            $updatedAuthor = $this->booksService->update($id, $request->all());
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
            $deleted = $this->booksService->delete($id);
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
    public function getBooksByAuthor($author_id)
    {
        $authorData = $this->booksService->getBooksByAuthor($author_id);

        if (!$authorData) {
            return response()->json([
                'responseCode' => 404,
                'ResponseDesc' => 'Author Not Found',
                'Data' => [],
            ], 404);
        }

        return response()->json([
            'responseCode' => 200,
            'ResponseDesc' => 'Success',
            'Data' => $authorData,
        ], 200);
    }




}