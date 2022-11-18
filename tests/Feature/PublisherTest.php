<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PublisherTest extends TestCase
{
    public function test_404(){
        $response=$this->delete('http://127.0.0.1:8000/api/deletePublisher/19');
        $response->assertStatus(404);
    }

    public function test_500(){
        $response=$this->delete('http://127.0.0.1:8000/api/deletePublisher/19');
        $response->assertStatus(500);
    }

    public function test_201(){
        $response=$this->post('http://127.0.0.1:8000/api/createPublisher');
        $response->assertStatus(201);
    }

    public function test_204(){
        $response=$this->delete('http://127.0.0.1:8000/api/deletePublisher/4');
        $response->assertStatus(204);
    }

    public function test_200(){
        $response=$this->get('http://127.0.0.1:8000/api/showPublisher');
        $response->assertStatus(200);
    }
}
