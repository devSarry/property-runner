<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Portfolio extends Model {


    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'active'
    ];



    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 0)->get();
    }

    public function buildings()
    {
        return $this->hasMany(Building::class, 'portfolio_id');
    }

    public function add(Building $building)
    {
        $this->buildings()->save($building);
    }

    public function count()
    {
        return $this->buildings()->count();
    }

    public function remove(Building $building)
    {
        $building->delete();
    }

    public function reset()
    {
        foreach ($this->buildings()->get() as $portfolio)
        {
            $portfolio->delete();
        }
    }
}
