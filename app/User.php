<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * A User has many portfolios
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    /**
     * Check if a user has a portfolio
     *
     * @return bool
     */
    public function hasPortfolio()
    {
        return $this->portfolios()->get()->count() > 0;
    }

    /**
     * A user can activate a portfolio. You can either pass
     * @param null Portfolio|int $portfolio
     * @return null
     */
    public function activate($portfolio = NULL)
    {
        if ($portfolio instanceof  Portfolio)
        {
            $this->portfolios()->update(['active' => FALSE]);

            $portfolio->active = TRUE;
            $portfolio->save();

            return $portfolio;
        }

        $this->activateById($portfolio);
    }

    /**
     * A user can add a portfolio
     *
     * @param Portfolio $portfolio
     */
    public function add(Portfolio $portfolio)
    {
        $this->portfolios()->save($portfolio);
        $this->activate($portfolio);
    }

    /**
     * @param Portfolio $portfolio
     * @throws \Exception
     */
    public function remove(Portfolio $portfolio)
    {
        if($portfolio->active && $this->portfolios()->get()->count() > 1){
            $this->activate($this->portfolios()->orderBy('created_at','desc')->first());
        }
        $portfolio->delete();
    }

    public function activePortfolio()
    {
        return $this->portfolios()->where('active', TRUE)->first();
    }

    private function activateById($id)
    {
        $portfolio = Portfolio::find($id);

        $this->activate($portfolio);

        return $portfolio;
    }

    /**
     * @param Building $building
     */
    public function addBuilding(Building $building)
    {
        $this->activePortfolio()->add($building);
    }


}
