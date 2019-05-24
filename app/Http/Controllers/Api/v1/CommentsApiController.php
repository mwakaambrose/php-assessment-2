<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Respositories\ApiCommentRepository;

class CommentsApiController extends Controller
{
    protected $repository;

    public function __construct(ApiCommentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function comments()
    {
        return $this->repository->getAll(COMMENTS_ENDPOINT);
    }

    public function comment($comment)
    {
        return $this->repository->getOne(COMMENTS_ENDPOINT, $comment);
    }
}
