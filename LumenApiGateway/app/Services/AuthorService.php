<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class AuthorService
{
    use ConsumeExternalService;

    /**
     * the base uri to consume the authors service.
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
        $this->baseUri = config('services.authors.base_uri');
        $this->secret = config('services.authors.secret');
    }

    /**
     * Return a list of all authors.
     * @return string
     */
    public function obtainAuthors()
    {
        return $this->performRequest('GET', '/authors');
    }

    /**
     * Create a new author using the authors service.
     * @return string
     */
     public function createAuthor($data)
     {
         return $this->performRequest('POST', '/authors', $data);
     }

    /**
    * Get an author using the authors service.
    * @return string
    */
    public function obtainAuthor($author)
    {
        return $this->performRequest('GET', "/authors/{$author}");
    }

    /**
     * Update an author instance using the authors service.
     * @return string
     */
    public function editAuthor($data, $author){
        return $this->performRequest('PUT', "/authors/{$author}", $data);
    }

    /**
     * Delete an author instance using the authors service.
     * @return string
     */
    public function deleteAuthor($author){
        return $this->performRequest('DELETE', "/authors/{$author}");
    }

}