<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Models\Author;
use App\Services\AuthorService;

class AuthorsController extends Controller
{
    use ApiResponser;
    
    /**
     * the service to consume the authors microservice.
     * return AuthorService
     */
    public $authorService;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }


    //
    /**
     * Return a list of all authors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->authorService->obtainAuthors());
    }

    /**
     * Create a new author.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->authorService->createAuthor($request->all()), Response::HTTP_CREATED);
    }


    /**
     * Get an author.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($author)
    {
        return $this->successResponse($this->authorService->obtainAuthor($author));
    }

    /**
     * Update an author.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $author)
    {
        return $this->successResponse($this->authorService->editAuthor($request->all(),$author));
    }

    /**
     * Delete an author.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($author)
    {
        return $this->successResponse($this->authorService->deleteAuthor($author));
    }
}
