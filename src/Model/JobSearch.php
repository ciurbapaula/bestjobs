<?php
/**
 * Created by PhpStorm.
 * User: ciurb
 * Date: 07.08.2018
 * Time: 12:02
 */

namespace App\Model;


class JobSearch
{
    private $keyword;

    /**
     * @return mixed
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * @param mixed $keyword
     */
    public function setKeyword($keyword): void
    {
        $this->keyword = $keyword;
    }

}