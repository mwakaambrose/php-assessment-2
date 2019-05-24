<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Respositories\ApiPostRepository;

class PostsApiController extends Controller
{
    protected $repository;

    public function __construct(ApiPostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function posts()
    {
        return $this->repository->getAll(POSTS_ENDPOINT);
    }

    public function post($post)
    {
        return $this->repository->getOne(POSTS_ENDPOINT, $post);
    }

    public function comments($post)
    {
        return $this->repository->getAllPostComments(POSTS_ENDPOINT, $post);
    }
}
