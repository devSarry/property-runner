<?php

/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 12/29/2015
 * Time: 7:02 PM
 */
use App\Portfolio;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PortfolioTest extends TestCase {

    private $user;
    private $portfolio;

    use DatabaseTransactions;
    /** @test * */
    function it_fetches_a_portfolio()
    {
        $this->createUser();

        $portfolio = factory(Portfolio::class)->make();

        $this->user->add($portfolio);

        $this->assertEquals($this->user->portfolios()->first(), Portfolio::find( $this->user->portfolios()->first()->id));
    }

    /** @test * */
    function it_can_add_a_building()
    {
        //given a user has a portfolio.
        $this->createUser()->withPortfolio();


        //When a building is created
        $building = factory(\App\Building::class)->make();

        //and added to the portfolio
        $this->portfolio->add($building);

        //then
        $this->assertEquals(1, $this->portfolio->count());
    }

    /** @test * */
    function it_can_be_set_as_active()
    {
        $this->createUser()->withPortfolio(3);

    }


    /** @test * */
    function it_can_remove_a_building()
    {
        //given a user has a portfolio with buildings.
        $this->createUser()->withPortfolio();

        $building = factory(\App\Building::class)->make();
        $buildingTwo = factory(\App\Building::class)->make();

        $this->portfolio->add($building);
        $this->portfolio->add($buildingTwo);

        //when it is removed
        $this->portfolio->remove($building);

        $this->assertEquals(1, $this->portfolio->count());
    }

    /** @test * */
    function it_can_remove_all_buildings()
    {
        $this->createUser()->withPortfolio();

        $building = factory(\App\Building::class)->make();
        $buildingTwo = factory(\App\Building::class)->make();

        $this->portfolio->add($building);
        $this->portfolio->add($buildingTwo);

        $this->portfolio->reset();

        $this->assertEquals(0, $this->portfolio->count());
    }

    /**
     * @return mixed
     */
    protected function createUser()
    {
        $user = factory(\App\User::class)->create();

        $this->user = $user;

        return $this;
    }

    /**
     * @param int $value
     * @return mixed
     */
    protected function withPortfolio($value = 1)
    {
        $this->portfolio = factory(Portfolio::class, $value)->make();

        if($this->portfolio instanceof \Illuminate\Database\Eloquent\Collection){

            foreach($this->portfolio as $portfolio) {

                $this->user->add($portfolio);
            }
            return $this->user;
        }

        $this->user->add($this->portfolio);

    }
}
