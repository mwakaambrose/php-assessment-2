<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Respositories\ApiUserRepository;

class UserApiController extends Controller
{
    protected $repository;

    public function __construct(ApiUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function users()
    {
        return $this->repository->getAll(USERS_ENDPOINT);
    }

    public function user($user)
    {
        return $this->repository->getOne(USERS_ENDPOINT, $user);
    }

    public function posts($user)
    {
        return $this->repository->getAllUsersPosts(POSTS_ENDPOINT, $user);
    }
}
