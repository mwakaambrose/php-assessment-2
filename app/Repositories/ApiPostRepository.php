<?php

namespace App\Respositories;


use GuzzleHttp\Client;
use App\Cache\AppCache;
use GuzzleHttp\Exception\GuzzleException;
use App\Respositories\Contracts\Repository;

class ApiPostRepository implements Repository
{
    const CACHE_EXPIRATION = 60*60*60;

    public function getAll($ext_end_point)
    {
        return AppCache::remember('posts.getAll', self::CACHE_EXPIRATION, function() use($ext_end_point) {
            $client = new Client();
            return $client->request('GET', $ext_end_point, [])->getBody();
        });
    }

    public function getOne($ext_end_point, $user_id)
    {
        return AppCache::remember('posts.getOne', self::CACHE_EXPIRATION, function() use($ext_end_point, $user_id) {
            $client = new Client();
            $url  = $ext_end_point."/".$user_id;
            return $client->request('GET', $url, [])->getBody();
        });
    }

    public function getAllPostComments($ext_end_point, $post_id)
    {
        return AppCache::remember('posts.getAllUsersPosts', self::CACHE_EXPIRATION, function() use($ext_end_point, $post_id) {
            $client = new Client();
            $url = $ext_end_point."/".$post_id."/comments";
            return $client->request('GET', $url, [])->getBody();
        });
    }
}

