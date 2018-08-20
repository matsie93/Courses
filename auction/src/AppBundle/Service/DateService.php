<?php
/**
 * Created by PhpStorm.
 * User: Sienio
 * Date: 06.09.2017
 * Time: 19:40
 */

namespace AppBundle\Service;


class DateService
{
    public function getDay(\DateTime $date)
    {
        return $date->format("d");
    }

}