<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase {

    use DatabaseTransactions;

    /** @test * */
    function it_fetches_a_users_portfolios()
    {
        $user = $this->makeUser();

        $portfolio = factory(\App\Portfolio::class)->make()->toArray();

        $user->portfolios()->create($portfolio);

        $this->assertNotEmpty($user->portfolios()->get(), "User has no portfolios");
    }

    /** @test * */
    function a_user_can_add_a_portfolio()
    {

        $user = $this->makeUser();

        $portfolio = $this->makePortfolio();

        $user->add($portfolio);

        $this->assertTrue($user->hasPortfolio(), "User has portfolios");
    }

    /** @test * */
    function the_last_portfolio_a_user_adds_will_be_the_active_one()
    {
        $user = $this->makeUser();

        $portfolio = $this->makePortfolio();
        $portfolioTwo = $this->makePortfolio();

        $user->add($portfolio);
        $user->add($portfolioTwo);

        $activePortfolio = $user->activePortfolio();

        $this->assertEquals($portfolioTwo->id, $activePortfolio->id);
    }

    /** @test * */
    function a_user_can_set_an_active_portfolio()
    {
        $user = $this->makeUser();

        $portfolio = $this->makePortfolio();
        $portfolioTwo = $this->makePortfolio();

        $user->add($portfolio);
        $user->add($portfolioTwo);

        //case 1
        $activePortfolio = $user->activate($portfolio);

        $this->assertEquals($portfolio->id, $activePortfolio->id);

        //case 2
        $activePortfolio = $user->activate($portfolioTwo);

        $this->assertEquals($portfolioTwo->id, $activePortfolio->id);

    }

    /** @test * */
    function a_user_can_remove_a_portfolio()
    {
        $user = $this->makeUser();

        $portfolio = $this->makePortfolio();

        $user->add($portfolio);

        $this->assertTrue($user->hasPortfolio(), "User has portfolios");

        $user->remove($portfolio);

        $this->assertTrue(! $user->hasPortfolio(), "User has portfolios");

    }

    /** @test * */
    function when_a_user_removes_an_active_portfolio_the_last_added_portfolio_will_be_active()
    {
        $user = $this->makeUser();

        $portfolio = $this->makePortfolio();
        $portfolioTwo = $this->makePortfolio();

        $user->add($portfolio);
        $user->add($portfolioTwo);

        $this->assertEquals($portfolioTwo->id, $user->activePortfolio()->id);

        $user->remove($portfolioTwo);

        $this->assertEquals($portfolio->id, $user->activePortfolio()->id);

    }

    /** @test * */
    function checks_if_user_has_a_portfolio()
    {

        $user = $this->makeUser();

        $portfolio = factory(\App\Portfolio::class)->make()->toArray();

        $this->assertFalse($user->hasPortfolio(), "User has portfolios");

        $user->portfolios()->create($portfolio);

        $this->assertTrue($user->hasPortfolio(), "User has portfolios");
    }

    /** @test * */
    function a_user_can_add_buildings_to_their_active_portfolio()
    {
        $user = $this->makeUser();
        $portfolio = $this->makePortfolio();

        $user->add($portfolio);

        $this->actingAs($user);

        $building = factory(\App\Building::class)->make();

        Auth::user()->addBuilding($building);

        $this->seeInDatabase('buildings', [
            'name'         => $building->name,
            'portfolio_id' => $portfolio->id
        ]);
    }

    private function makeUser($value = 1, $usersFiled = [])
    {
        $user = factory(User::class, $value)->create($usersFiled);

        return $user;
    }

    /**
     * @return mixed
     */
    public function makePortfolio()
    {
        $portfolio = factory(\App\Portfolio::class)->make();

        return $portfolio;
    }
}
