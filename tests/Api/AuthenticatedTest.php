<?php

namespace Tests\Api;

use App\Models\User;

abstract class AuthenticatedTest
{
    protected User $user;
    protected string $token;

    public function _before()
    {
        $this->user = User::create([
            'name' => 'Tester',
            'email' => 'test@test.de',
            'password' => bcrypt('1234')
        ]);

        $this->token = $this->user->createToken('myapptoken')->plainTextToken;
    }


    public function _after(){
        $this->user->delete();
    }
}
