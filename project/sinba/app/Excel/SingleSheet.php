<?php
/**
 * Created by PhpStorm.
 * User: mariliack
 * Date: 21/02/17
 * Time: 00:51
 */

namespace App\Excel;


abstract class SingleSheet
{
    /**
     * @return string
     */
    public function company() {
        return config('app.name');
    }

    /**
     * @return string
     */
    abstract public function description();

    /**
     * @return string
     */
    abstract public function fileName();

    /**
     * @return string
     */
    abstract public function title();

    /**
     * @return string[]
     */
    abstract public function labels();
}