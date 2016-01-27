<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginPageTest extends TestCase
{
    use DatabaseTransactions;

    /** @test * */
    function login_fields_are_on_page()
    {
        $form = $this->visit('/login')
                    ->getForm('Login');

        $this->assertTrue($form->has('email'));
        $this->assertTrue($form->has('password'));
    }

    /** @test * */
    function login_a_user()
    {
        $userData = [
            'email' => 'test_user@test.com',
            'password' => bcrypt('password')
        ];
        $user = factory(User::class)->create($userData);

        $this->visit('/login')
            ->submitForm('Login', ['email' => 'test_user@test.com', 'password' => 'password'])
            ->seePageIs('/home');
    }
}
