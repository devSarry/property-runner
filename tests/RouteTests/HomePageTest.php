<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomePageTest extends TestCase
{


    /** @test * */
    function logo_is_on_page()
    {
        $this->visit('/')
            ->see('Property Runner');
    }

    /** @test * */
    function login_and_register_links()
    {
        $this->visit('/')
            ->see('Login')
            ->see('Register');
    }

    /** @test * */
    function go_to_login_page()
    {
        $this->visit('/')
            ->click('Login')
            ->seePageIs('/login')
            ->see('password');
    }

    /** @test * */
    function go_to_register_page()
    {
        $this->visit('/')
            ->click('Register')
            ->seePageIs('/register')
            ->see('name');
    }
}
