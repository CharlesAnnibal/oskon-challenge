<?php

namespace Tests\Feature\Api\CustomUser;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class DeleteTest extends TestCase
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

    public function testeDeleteCustomUser()
    {
        $response = $this->json(
            'DELETE',
            '/api/user/1'
        );
        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => "Utilizador Charles Santos foi removido com sucesso."
            ]);
    }
}
