<?php

namespace Tests\Feature\Api\CustomUser;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class ReadTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        DB::table('custom_users')->insert([
            'name' => 'Charles',
            'email' => 'charlesannibal@gmail.com',
            'birthday' => '28-05-1991',
            'gender' => 'M',
            "created_at" => '2020-11-20T16:14:39.000000Z',
            "updated_at" => '2020-11-20T16:14:39.000000Z'
        ]);
        DB::table('custom_users')->insert([
            'name' => 'Joana',
            'email' => 'Silva',
            'birthday' => '18-07-1988',
            'gender' => 'F',
            "created_at" => '2020-11-20T16:14:39.000000Z',
            "updated_at" => '2020-11-20T16:14:39.000000Z'
        ]);
    }

    /**
     *
     * @return void
     */
    public function testGetCustomUserRequest()
    {
        $response = $this->get('/api/user/1');
        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'name' => 'Charles',
                    'email' => 'charlesannibal@gmail.com',
                    'birthday' => '28-05-1991',
                    'gender' => 'M',
                    "created_at" => '2020-11-20T16:14:39.000000Z',
                    "updated_at" => '2020-11-20T16:14:39.000000Z'
                ]
            ]);
    }

    /**
     *
     * @return void
     */
    public function testGetCustomUserListRequest()
    {
        $response = $this->get('/api/user');
        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'name' => 'Charles',
                        'email' => 'charlesannibal@gmail.com',
                        'birthday' => '28-05-1991',
                        'gender' => 'M',
                        "created_at" => '2020-11-20T16:14:39.000000Z',
                        "updated_at" => '2020-11-20T16:14:39.000000Z',
                    ],
                    [
                        'name' => 'Joana',
                        'email' => 'Silva',
                        'birthday' => '18-07-1988',
                        'gender' => 'F',
                        "created_at" => '2020-11-20T16:14:39.000000Z',
                        "updated_at" => '2020-11-20T16:14:39.000000Z',
                    ]
                ]
            ]);
    }
}
