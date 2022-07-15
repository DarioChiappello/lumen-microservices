<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class BookService
{
    use ConsumeExternalService;

    /**
     * the base uri to consume the books service.
     *  @var string
     */
    public $baseUri;

     /**
     * the secret to consume the authors service.
     *  @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
        $this->secret = config('services.books.secret');
    }

    /**
     * Return a list of all books.
     * @return string
     */
    public function obtainBooks()
    {
        return $this->performRequest('GET', '/books');
    }

    /**
     * Create a new book using the books service.
     * @return string
     */
     public function createBook($data)
     {
         return $this->performRequest('POST', '/books', $data);
     }

    /**
    * Get an book using the books service.
    * @return string
    */
    public function obtainBook($book)
    {
        return $this->performRequest('GET', "/books/{$book}");
    }

    /**
     * Update an book instance using the books service.
     * @return string
     */
    public function editBook($data, $book){
        return $this->performRequest('PUT', "/books/{$book}", $data);
    }

    /**
     * Delete an book instance using the books service.
     * @return string
     */
    public function deleteBook($book){
        return $this->performRequest('DELETE', "/books/{$book}");
    }
}