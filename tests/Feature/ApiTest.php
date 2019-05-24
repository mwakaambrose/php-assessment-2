<?php

namespace Tests\Feature;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{

    public function test_fetches_all_users()
    {
        $client = new Client();
        $data = $client->request('GET', USERS_ENDPOINT, [])->getBody();

        $response = $this->get('/api/v1/users');
        $response->assertStatus(200);
        $response->assertOk();
        // Correct response is comming through
        $response->assertJson(json_decode($data, TRUE));
    }

    public function test_fetches_a_single_user()
    {
        $client = new Client();
        $data = $client->request('GET', USERS_ENDPOINT."/1", [])->getBody();

        $response = $this->get('/api/v1/users/1');
        $response->assertOk();
        $response->assertJson(json_decode($data, TRUE));
    }

    public function test_fetches_a_users_posts()
    {
        $client = new Client();
        $data = $client->request('GET', POSTS_ENDPOINT."?userId=1", [])->getBody();

        $response = $this->get('/api/v1/users/1/posts');
        $response->assertOk();
        $response->assertJson(json_decode($data, TRUE));
    }

    public function test_fetches_all_posts()
    {
        $client = new Client();
        $data = $client->request('GET', POSTS_ENDPOINT, [])->getBody();

        $response = $this->get('/api/v1/posts');
        $response->assertStatus(200);
        $response->assertOk();
        $response->assertJson(json_decode($data, TRUE));
    }

    public function test_fetches_a_single_post()
    {
        $client = new Client();
        $data = $client->request('GET', POSTS_ENDPOINT."/1", [])->getBody();

        $response = $this->get('/api/v1/posts/1');
        $response->assertOk();
        $response->assertJson(json_decode($data, TRUE));
    }

    public function test_fetches_a_posts_comments()
    {
        $client = new Client();
        $data = $client->request('GET', POSTS_ENDPOINT."/1/comments", [])->getBody();

        $response = $this->get('/api/v1/posts/1/comments');
        $response->assertOk();
        $response->assertJson(json_decode($data, TRUE));
    }

    public function test_fetches_all_comments()
    {
        $client = new Client();
        $data = $client->request('GET', COMMENTS_ENDPOINT, [])->getBody();

        $response = $this->get('/api/v1/comments');
        $response->assertStatus(200);
        $response->assertOk();
        $response->assertJson(json_decode($data, TRUE));
    }

    public function test_fetches_a_single_comment()
    {
        $client = new Client();
        $data = $client->request('GET', COMMENTS_ENDPOINT."/1", [])->getBody();

        $response = $this->get('/api/v1/comments/1');
        $response->assertOk();
        $response->assertJson(json_decode($data, TRUE));
    }
}
