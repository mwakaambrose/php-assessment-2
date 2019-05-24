<?php

namespace App\Respositories\Contracts;

interface Repository {
    public function getAll($external_end_point);
    public function getOne($external_end_point, $id);
}
