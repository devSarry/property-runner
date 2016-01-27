<?php
use App\Indicator_Group;


/**
 * a global flash function that when called will
 * pass the string $message the flash object if set
 *
 * @param $title
 * @param $message
 * @return mixed
 */
function flash($title = null, $message = null)
{
    /** instantiating an instance of the Flash */
    $flash = app('App\Http\Flash');

    /*If we call the flash function and don't pass any
    variables through then we just want to return the flash
    instance*/
    if (func_num_args() == 0){
        return $flash;
    }

    /*Otherwise we want to immediately return a default
    flash message to the user*/
    return $flash->info($title, $message);
}


/**
 * Generates string formatted labels to insert into views. Takes an array of fillable attributes
 * splits them by "_" then upper cases each word. It returns an array where the field name is the key
 * and the formatted string is the value. ['attribute' => 'Formatted Label']
 *
 * @param array $attributes
 * @return array
 */
function makeLabels(array $attributes) {
    $labels = [];
    foreach ($attributes as $attribute)
    {
        $labels += [$attribute => ucwords(implode(' ', explode('_', $attribute)))];
    }

    return $labels;
}