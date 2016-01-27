<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DashboardPageTest extends TestCase
{
    use DatabaseTransactions;

    /** @test * */
    function a_user_should_be_logged_in_to_see_the_page()
    {
        $this->visit('/home')
            ->seePageIs('/login');
    }

    /** @test * */
    function a_user_without_a_portfolio_should_be_prompted_to_create_one()
    {
        $user = factory(\App\User::class)->create();

        $this->be($user);

        $this->visit('/home')
            ->see('Create Portfolio');
    }

    /** @test * */
    function a_user_with_a_portfolio_should_be_see_their_building()
    {
        $user = factory(\App\User::class)->create();

        $portfolio = factory(\App\Portfolio::class)->make();

        $this->be($user);

        $user->add($portfolio);

        $building = factory(\App\Building::class)->make();
        $user->addBuilding($building);

        $this->visit('/home')
            ->see('Buildings');

    }
}
