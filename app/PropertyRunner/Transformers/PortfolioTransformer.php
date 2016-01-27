<?php
/**
 * User: Pascal
 * Date: 12/29/2015
 * Time: 5:06 PM
 */

namespace PropertyRunner\Transformers;

use App\Portfolio;
use League\Fractal;

class PortfolioTransformer extends Fractal\TransformerAbstract {

    public function transform(Portfolio $portfolio)
    {
        return [
            'name' => $portfolio->name,
            'description' => $portfolio->description
        ];
    }
}