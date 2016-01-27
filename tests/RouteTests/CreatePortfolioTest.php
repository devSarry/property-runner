<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreatePortfolioTest extends TestCase
{
    use DatabaseTransactions;

    /** @test * */
    function a_user_should_be_logged_in_to_see_the_page()
    {
        $this->visit('/portfolio/create')
            ->seePageIs('/login');
    }

    /** @test * */
    function a_user_can_create_a_portfolio()
    {
        $user = factory(\App\User::class)->create();

        $this->be($user);

        $this->visit('/portfolio/create')
            ->see('Create Portfolio')
            ->submitForm('Create Portfolio', ['name' => 'test folio', 'description' => 'Something test']);

        $portfolio = $user->portfolios->first();
        $this->assertEquals('test folio', $portfolio->name);
    }

    /** @test * */
    function a_user_with_a_portfolio_should_be_see_their_building()
    {
        $user = factory(\App\User::class)->create();

        $this->be($user);

        $this->visit('/home')
            ->see('Create Portfolio');
    }
}
