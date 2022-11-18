<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Type extends TestCase
{
    public function test_404(){
        $response=$this->delete('http://127.0.0.1:8000/api/deleteType/19');
        $response->assertStatus(404);
    }

    public function test_500(){
        $response=$this->delete('http://127.0.0.1:8000/api/deleteType/19');
        $response->assertStatus(500);
    }

    public function test_201(){
        $response=$this->post('http://127.0.0.1:8000/api/createType');
        $response->assertStatus(201);
    }

    public function test_204(){
        $response=$this->delete('http://127.0.0.1:8000/api/deleteType/4');
        $response->assertStatus(204);
    }

    public function test_200(){
        $response=$this->get('http://127.0.0.1:8000/api/showType');
        $response->assertStatus(200);
    }
}
