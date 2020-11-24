<?php

namespace Tests\Feature\Api\CustomUser;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function defaultTestCreateCustomUser()
    {
        $response = $this->json(
            'POST',
            '/api/user',
            [
                'name' => 'Luis Siva',
                'email' => 'luissilva@gmail.com',
                'birthday' => '28/05/1991',
                'gender' => 'M'
            ]
        );
        $response->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'name',
                    'email',
                    'birthday',
                    'gender'
                ],
            ]);
    }

    public function testCreateCustomUserWithEmpty()
    {
        $response = $this->json(
            'POST',
            '/api/user',
            [
                'name' => '',
                'email' => '',
                'birthday' => '',
                'gender' => ''
            ]
        );
        $response->assertStatus(422)
            ->assertJson([
                'message' => "The given data was invalid.",
                'errors' => [
                    'name' => ["The name field is required."],
                    'email' => ["The email field is required."],
                    'birthday' => ["The birthday field is required."],
                    'gender' => ["The gender field is required."],
                ],
            ]);
    }
}
