<?php

namespace App\Respositories;


use GuzzleHttp\Client;
use App\Cache\AppCache;
use GuzzleHttp\Exception\GuzzleException;
use App\Respositories\Contracts\Repository;

class ApiCommentRepository implements Repository
{
    const CACHE_EXPIRATION = 60*60*60;

    public function getAll($ext_end_point)
    {
        return AppCache::remember('comments.getAll', self::CACHE_EXPIRATION, function() use($ext_end_point) {
            $client = new Client();
            return $client->request('GET', $ext_end_point, [])->getBody();
        });
    }

    public function getOne($ext_end_point, $comment_id)
    {
        return AppCache::remember('comments.getOne', self::CACHE_EXPIRATION, function() use($ext_end_point, $comment_id) {
            $client = new Client();
            $url = $ext_end_point."/".$comment_id;
            return $client->request('GET', $url, [])->getBody();
        });
    }
}

