<?php

namespace Tests\Feature\Api\CustomUser;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        DB::table('custom_users')->insert([
            'name' => 'Charles Santos',
            'email' => 'charlesannibal@gmail.com',
            'birthday' => '28/05/1991',
            'gender' => 'M',
            "created_at" => '2020-11-20T16:14:39.000000Z',
            "updated_at" => '2020-11-20T16:14:39.000000Z',
        ]);
    }

    /**
     * @return void
     */
    public function  testEditCustomUserRequest()
    {
        $response = $this->json(
            'PUT',
            '/api/user/1',
            [
                'name' => 'Charles Silva',
                'email' => 'charles.silva@gmail.com',
                'birthday' => '28-05-1991',
                'gender' => 'M'
            ]
        );
        $response
            ->dump()
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'name' => 'Charles Silva',
                    'email' => 'charles.silva@gmail.com',
                    'birthday' => '28-05-1991',
                    'gender' => 'M'
                ],
            ]);
    }
}
