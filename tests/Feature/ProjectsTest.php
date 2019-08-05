<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function a_user_can_create_a_project(){
        $this->actingAs(\factory('App\User')->create());

        $this->post('/projects', [
          'title' => 'Project 3',
          'description' => ''

        ]);


        $this->assertDatabaseHas('projects');
    }
}
