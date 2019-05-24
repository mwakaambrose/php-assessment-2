<?php

namespace App\Respositories;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use App\Respositories\Contracts\Repository;

class ApiCommentRepository implements Repository
{
    public function getAll($ext_end_point)
    {
        $client = new Client();
        return $client->request('GET', $ext_end_point, [])->getBody();
    }

    public function getOne($ext_end_point, $user_id)
    {
        $client = new Client();
        $url = $ext_end_point."/".$user_id;
        return $client->request('GET', $url, [])->getBody();
    }
}

